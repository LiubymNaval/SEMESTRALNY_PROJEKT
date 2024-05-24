<?php
namespace otazkyodpovede;
error_reporting(E_ALL); //zapnutie chybových hlásení
ini_set("display_errors","Off");
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/Database.php');
require_once(__ROOT__.'/classes/Users.php');
use Database;
use Users;
use PDO;
use Exception;
class QnA extends Database {
    protected $connection;
    public function __construct() {
        $this->connect();
        //Použitie gettera na získanie spojenia
        $this->connection = $this->getConnection();
    }
    public function getQnAById($id) {
        if (!is_numeric($id)) {
            echo 'ID otázky musí byť číslo.';
            exit;
        }
        $sql = "SELECT * FROM qna WHERE ID = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        // Získanie dát
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function updateQnA($id, $question, $answer) {
        if (!is_numeric($id)) {
            echo 'ID otázky musí byť číslo.';
            exit;
        }
        $sql = "UPDATE qna SET otazka = :question, odpoved = :answer WHERE ID = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':question', $question);
        $statement->bindParam(':answer', $answer);
        $statement->execute();
    }

    public function getQnA(){
        $sql = "SELECT * FROM qna";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        // Získanie dát
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $admin = new Users();
        if ($admin->isAdmin()) {
            // Zobrazenie tlačidiel na editáciu a vymazanie
            foreach ($data as $row) {
                echo '<div class="accordion">
                    <div class="question">' .
                    $row["otazka"] . '
                    <div class="buttons">
                        <a href="db/edit_qna.php?id=' . $row["ID"] . '" >Editovať</a>
                        <a href="db/delete_qna.php?id=' . $row["ID"] . '" >Vymazať</a>
                    </div>
                     </div>
                    <div class="answer">' .
                    $row["odpoved"] . '
                    </div>
            </div>';
            }
        } else {
            // Zobrazenie otázok a odpovedí
            if ($data) {
                foreach ($data as $row) {
                    echo '<div class="accordion">
                        <div class="question">' .
                        $row["otazka"] . '
                         </div>
                        <div class="answer">' .
                        $row["odpoved"] . '
                        </div>
                </div>';
                }
            } else {
                echo "Neboli nájdené žiadne otázky a odpovede.";
            }
        }
        // Uzatvorenie spojenia
            $this->connection = null;
    }
    public function deleteQnA($id) {
        if (!is_numeric($id)) {
            echo 'ID otázky musí byť číslo.';
            exit;
        }
        $sql = "DELETE FROM qna WHERE ID = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
    public function insertQnA(){
        try {
          // Načítanie JSON súboru
            $data = json_decode(file_get_contents
            (__ROOT__.'/data/datas.json'), true);
            $otazky = $data["otazky"];
             $odpovede = $data["odpovede"];
             // Vloženie otázok a odpovedí v rámci transakcie
            $this->connection->beginTransaction();
            $sqlCheck = "SELECT COUNT(*) AS count FROM qna WHERE otazka = :otazka AND odpoved = :odpoved";
            $statementCheck = $this->connection->prepare($sqlCheck);

            $sqlInsert = "INSERT INTO qna (otazka, odpoved) VALUES (:otazka, :odpoved)";
            $statementInsert = $this->connection->prepare($sqlInsert);

            for ($i = 0; $i < count($otazky); $i++) {
            // Kontrola, či takýto záznam už existuje
            $statementCheck->bindParam(':otazka', $otazky[$i]);
            $statementCheck->bindParam(':odpoved', $odpovede[$i]);
            $statementCheck->execute();
            $result = $statementCheck->fetch(PDO::FETCH_ASSOC);

             if ($result['count'] == 0) {
            // Ak záznam neexistuje, vložim nový
            $statementInsert->bindParam(':otazka', $otazky[$i]);
            $statementInsert->bindParam(':odpoved', $odpovede[$i]);
            $statementInsert->execute();
             }
            }
               $this->connection->commit();
              }catch (Exception $e) {
               // Zobrazenie chybového hlásenia
                echo "Chyba pri vkladaní dát do databázy: " . $e->getMessage();
                $this->connection->rollback(); 
                // Vrátenie späť zmien v prípade chyby
              } finally {
            
        }
    }
}
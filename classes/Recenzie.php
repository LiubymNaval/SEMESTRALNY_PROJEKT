<?php
namespace recenzie;
error_reporting(E_ALL); //zapnutie chybových hlásení
ini_set("display_errors","Off");
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/Database.php');
require_once(__ROOT__.'/classes/Users.php');
use Database;
use Users;
use PDO;
use Exception;
class Recenzie extends Database {
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
        
    public function getRecenzie(){
        $sql = "SELECT * FROM comments";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        // Získanie dát
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $admin = new Users();
        if ($admin->isAdmin()) {
            // Zobrazenie tlačidiel na editáciu a vymazanie
            foreach ($data as $row) {
                echo '<div class="reviews-container">
                    <div class="review">
                      <div class="user-info">
                        <span class="username">' .$row["meno"] . '</span>
                        <span class="rating"><span class="rating-stars" data-rating="' . $row["hodnotenie"] . '"></span></span>
                      </div>
                      <p class="comment">' .$row["komentar"] . '</p>
                      <div class="buttons">
                      <a href="db/edit_qna.php?id=' . $row["ID"] . '" style="color: black; background-color: greenyellow; padding: 5px;">Editovať</a>
                      <a href="db/delete_qna.php?id=' . $row["ID"] . '" style="color: black; background-color: greenyellow;padding: 5px;">Vymazať</a>
                     </div>
                    </div>
                  </div>';
                  echo '<script>
                  function createStars(element, rating) {
                      let stars = "";
                      for (let i = 0; i < rating; i++) {
                          stars += "&#9733;"; 
                      }
                      element.innerHTML = stars;
                  }
  
                  document.querySelectorAll(".rating-stars").forEach(function(starsContainer) {
                      const rating = starsContainer.getAttribute("data-rating");
                      createStars(starsContainer, rating);
                  });
                  </script>';  
            }
        } else {
            // Zobrazenie otázok a odpovedí
            if ($data) {
                foreach ($data as $row) {
                    echo '<div class="reviews-container">
                    <div class="review">
                      <div class="user-info">
                        <span class="username">' .$row["meno"] . '</span>
                        <span class="rating"><span class="rating-stars" data-rating="' . $row["hodnotenie"] . '"></span></span>
                      </div>
                      <p class="comment">' .$row["komentar"] . '</p>
                      <div class="buttons">
                        <a href="db/edit_qna.php?id=' . $row["ID"] . '" style="color: black; background-color: greenyellow; padding: 5px;">Editovať</a>
                        <a href="db/delete_qna.php?id=' . $row["ID"] . '" style="color: black; background-color: greenyellow;padding: 5px;">Vymazať</a>
                    </div>
                    </div>
                  </div>';
                  echo '<script>
                  function createStars(element, rating) {
                      let stars = "";
                      for (let i = 0; i < rating; i++) {
                          stars += "&#9733;"; 
                      }
                      element.innerHTML = stars;
                  }
  
                  document.querySelectorAll(".rating-stars").forEach(function(starsContainer) {
                      const rating = starsContainer.getAttribute("data-rating");
                      createStars(starsContainer, rating);
                  });
                  </script>';  
                }
            } else {
                echo "Neboli nájdené žiadne komentare.";
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
    public function ulozitKomentar($id_user,$meno,$hodnotenie, $komentar) {
        $sql = "INSERT INTO comments (id_user,meno, hodnotenie, komentar) 
                VALUES (:id_user,:meno, :hodnotenie, :komentar)";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(array(':id_user' => $id_user,':meno' => $meno,':hodnotenie' => $hodnotenie,':komentar' => $komentar));
            http_response_code(200);
            return $insert;
        } catch (\Exception $exception) {
            http_response_code(500);
            return false;
        }
    }
    
}
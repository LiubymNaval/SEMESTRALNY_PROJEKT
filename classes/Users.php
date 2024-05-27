<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/Database.php');
class Users extends Database{
    private $rola;
    protected $connection;
    public function __construct() {
        $this->rola= "pouzivatel";
        $this->connect();
        //Použitie gettera na získanie spojenia
        $this->connection = $this->getConnection();
    }
    public function register($login, $email, $password){
        try {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            //overenenie či sa používateľ nachádza v db
            $sql = "SELECT * FROM pouzivatelia WHERE (login = ? OR email = ?) LIMIT 1;";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $login);
            $statement->bindParam(2, $email);
            $statement->execute();
            $existingUser = $statement->fetch();
            if ($existingUser) {
                echo '<script>';
                echo 'alert("Požívateľ už existuje");';
                echo 'window.history.back();';
                echo '</script>';
                exit();
            }
            $sql = "INSERT INTO pouzivatelia (login, email, heslo, rola) VALUES (?, ?, ?, ?)";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $login);
            $statement->bindParam(2, $email);
            $statement->bindParam(3, $hashedPassword);
            $statement->bindParam(4, $this->rola);
            $statement->execute();
        }catch (Exception $e){
            echo "Chyba pri vkladaní dát do databázy: " . $e->getMessage();
        } finally {
            $this->connection=null;
        }
    }
    public function login($email, $password) {
        //Kontrola existencie používateľa
        $sql = "SELECT * FROM pouzivatelia WHERE email = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $email);
        $statement->execute();
        $user = $statement->fetch();
        if (!$user) {
            echo '<script>';
            echo 'alert("Požívateľ s daným e-mailom neexistuje");';
            echo 'window.history.back();';
            echo '</script>';
            exit();
        }
        $storedPassword = $user['heslo'];
        // Overenie hesla
        if (!password_verify($password, $storedPassword)) {
            echo '<script>';
            echo 'alert("Nesprávne heslo");';
            echo 'window.history.back();';
            echo '</script>';
            exit();
        }
        // Spustenie session a uloženie informácií o používateľovi
        session_start();
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['rola'] = $user['rola'];
    }
    public function logout() {
        session_start();
        session_unset(); // Vymazanie všetkých session premenných
        session_destroy();
        header("Location: http://localhost/SEMESTRALNY_PROJEKT/profil.php");
        exit();
    }
    public function deleteUser($email, $password){
        $sql = "SELECT * FROM pouzivatelia WHERE email = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $email);
        $statement->execute();
        $user = $statement->fetch();
        //či existuje používateľ s touto e-mailovou adresou
        if (!$user) {
            echo '<script>';
            echo 'alert("Požívateľ s daným e-mailom neexistuje");';
            echo 'window.history.back();';
            echo '</script>';
            exit();
        }
        $storedPassword = $user['heslo'];
        // Overenie hesla
        if (!password_verify($password, $storedPassword)) {
            echo '<script>';
            echo 'alert("Nesprávne heslo");';
            echo 'window.history.back();';
            echo '</script>';
            exit();
        }
        //Získanie všetkých polí používateľa s touto e-mailovou adresou 
        $sql = "SELECT * FROM pouzivatelia WHERE email = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $email);
        $statement->execute();
        $user = $statement->fetch();
        //Vyhľadanie používateľa
        if ($user) {
        $delete_sql = "DELETE FROM pouzivatelia WHERE email = ?";
        $statement_delete = $this->connection->prepare($delete_sql);
        $statement_delete->bindParam(1, $email);
        $statement_delete->execute();
        //Kontrola vymazania používateľa
        if ($statement_delete->rowCount() > 0) {
            echo "Používateľ bol úspešne odstránený";
        } else {
            echo '<script>';
            echo 'alert("Používateľ nebol odstránený");';
            echo 'window.history.back();';
            echo '</script>';
            exit();
        }
        } else {
            echo '<script>';
            echo 'alert("Používateľ nebol nájdený");';
            echo 'window.history.back();';
            echo '</script>';
            exit();
        }

    }

    public function isAdmin(){
        session_start();
        if (isset($_SESSION['rola']) && $_SESSION['user_id']) {
            if($_SESSION['rola'] == 'admin'){
                echo "admin je tu";
                return true;
            }else{
            }
        }else{
            return false;
        }
    }
    public function isNotAdmin(){
        session_start();
        if (isset($_SESSION['rola']) && $_SESSION['user_id']) {
            if($_SESSION['rola'] == 'pouzivatel'){
                return true;
            }else{
            }
        }else{
            return false;
        }
    }
}
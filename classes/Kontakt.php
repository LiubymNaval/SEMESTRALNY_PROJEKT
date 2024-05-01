<?php
error_reporting(E_ALL); //zapnutie chybových hlásení
ini_set("display_errors","On");
require_once(__ROOT__.'/classes/Database.php');
class Kontakt extends Database {
    protected $connection;

    public function __construct() {
        $this->connect();
        //Použitie gettera na získanie spojenia
        $this->connection = $this->getConnection();
    }
    public function ulozitSpravu($meno, $email, $sprava) {
        $sql = "INSERT INTO Formulary (Meno, Email, Sprava) 
                VALUES (:Meno, :Email, :Sprava)";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(array(':Meno' => $meno,
                ':Email' => $email, ':Sprava' => $sprava));
            http_response_code(200);
            return $insert;
        } catch (\Exception $exception) {
            http_response_code(500);
            return false;
        }
    }
}
?>
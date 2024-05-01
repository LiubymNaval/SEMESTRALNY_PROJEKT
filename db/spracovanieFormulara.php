<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/Kontakt.php');
// Získanie údajov z formulára
$meno = $_POST["meno"];
$email = $_POST["email"];
$sprava = $_POST["sprava"];

if(!empty($meno) && !empty($email) && !empty($sprava)){
    $kontakt = new Kontakt();
    $ulozene = $kontakt->ulozitSpravu($meno, $email, $sprava);

}else {
    header("Location: http://localhost/SEMESTRALNY_PROJEKT/kontakt.php");
}

if ($ulozene) {
    header("Location: http://localhost/SEMESTRALNY_PROJEKT/kontakt.php");
} else {
    die('Chyba pri odosielaní správy do databázy!');
}

?>
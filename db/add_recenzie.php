<?php
error_reporting(E_ALL);
ini_set("display_errors","On");
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/Recenzie.php');
use recenzie\Recenzie;
$meno = $_POST['username'];
$komentar = $_POST['comment'];
$hodnotenie = 5;
$id_user = 2;
if(!empty($meno) && !empty($komentar)){
    $recenzie = new Recenzie();
    $result = $recenzie->ulozitKomentar($id_user, $meno, $hodnotenie, $komentar);

}else {
    header("Location: http://localhost/SEMESTRALNY_PROJEKT/recenzie.php");
}

if ($result) {
    header("Location: http://localhost/SEMESTRALNY_PROJEKT/recenzie.php");
} else {
    die('Chyba pri odosielaní správy do databázy!');
}
?>
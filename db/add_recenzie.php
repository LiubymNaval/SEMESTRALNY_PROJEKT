<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors","On");
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/Recenzie.php');
use recenzie\Recenzie;
$meno = $_SESSION['login'];
$komentar = $_POST['comment'];
$hodnotenie = $_POST['rating'];
$id_user =  $_SESSION['user_id'];
$datum = date('Y-m-d');
//Kontrola prázdnych hodnôt
if(!empty($meno) && !empty($komentar) && !empty($hodnotenie) && !empty($id_user)){
    $recenzie = new Recenzie();
    $result = $recenzie->ulozitKomentar($id_user, $meno, $hodnotenie, $komentar,$datum);
    //Kontrola, ak recenzia už existuje, zakázať možnosť pridania novej
    if ($result === false) {
        echo '<script>';
        echo 'alert("Už máte existujúcu recenziu");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
    }
}else {
        echo '<script>';
        echo 'alert("Pridajte prosím svoje hodnotenie:)");';
        echo 'window.history.back();';
        echo '</script>';
        exit;
}

if ($result) {
    header("Location: http://localhost/SEMESTRALNY_PROJEKT/recenzie.php");
} else {
    die('Chyba pri odosielaní správy do databázy!');
}
?>
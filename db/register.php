<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/Users.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
// Overenie údajov
if (empty($username) || empty($email) || empty($password)) {
    die('Chyba: Všetky polia sú povinné!');
}
try {
    $user = new Users();
    $user->register($username, $email, $password);
    echo '<script>';
    echo 'alert("Úspešne ste sa zaregistrovali");';
    echo 'window.location.href = "http://localhost/SEMESTRALNY_PROJEKT/profil.php";';
    echo '</script>';
}catch (Exception $e){
    http_response_code(404);
    die('Chyba pri odosielaní správy do databázy!');
}
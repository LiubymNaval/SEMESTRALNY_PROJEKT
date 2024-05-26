<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/Users.php');
            
$email = $_POST['email'];
$password = $_POST['password'];
            
// Overenie údajov
if (empty($email) || empty($password)) {
    die('Chyba: Všetky polia sú povinné!');
}
try {
    $user = new Users();
    $user->deleteUser($email, $password);
    echo '<script>';
    echo 'alert("Používateľ bol úspešne odstránený");';
    echo 'window.location.href = "http://localhost/SEMESTRALNY_PROJEKT/profil.php";';
    echo '</script>';
}catch (Exception $e){
    http_response_code(404);
    echo("Chyba: " . $e->getMessage());
}

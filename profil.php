<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Prihlásiť/Registrovať</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/profil.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
$file_path = "parts/header.php";
if(!require($file_path)){
    echo "Failed to include $file_path";
}
?>
<section class="banner">
        <div class="container text-white">
           
        </div>
    </section>
    <section class="container">
    <h2>Registrácia a prihlásenie</h2>
        <div class="row">
            <div class="form-container register-form">
                <h2 class="form-title">Registrácia</h2>
                <form method="post" action="db/register.php" id="CreateAccount">
                    <div class="form-group">
                        <label for="username">Používateľské meno:</label>
                        <input type="text" id="username" name="username" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Heslo:</label>
                        <input type="password" id="password" name="password" class="form-input" required>
                    </div>
                    <button type="submit" class="form-button">Registrovať</button>
                </form>
                <p class="form-link register-link">Už máte účet? <a href="#Login" id="linkLogin">Prihlásiť sa</a></p>
            </div>
            <div class="form-container login-form">
                <h2 class="form-title">Prihlásenie</h2>
                <form method="post" action="db/login.php" id="Login">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Heslo:</label>
                        <input type="password" id="password" name="password" class="form-input" required>
                    </div>
                    <button type="submit" class="form-button">Prihlásiť</button>
                </form>
                <p class="form-link login-link">Nemáte účet? <a href="#CreateAccount" id="linkCreateAccount">Registrovať</a></p>
            </div>
            <div class="form-container login-Delete">
                <h2 class="form-title">Vymazanie používateľa</h2>
                <form method="post" action="db/delete_user.php" id="Delete">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Heslo:</label>
                        <input type="password" id="password" name="password" class="form-input" required>
                    </div>
                    <button type="submit" class="form-button">Vymazať</button>
                </form>
            </div>
        </div>
    </section>
    <?php
    $file_path = "parts/footer.php";
        if(!require($file_path)){
      echo "Failed to include $file_path";
    }
    ?>
<script src="js/app.js"></script>

</body>
</html>
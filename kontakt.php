<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kontakt</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
$file_path = "parts/header.php";
if(!require($file_path)){
    echo "Failed to include $file_path";
}
?>
<main class="container">
    <section>
      <div class="row" style="background-color: greenyellow">
        <div class="col-100 text-center"> 
          <h2>Máte ešte nejaké otázky alebo by ste sa chceli pripojiť k klubu LOMBERX FC?</h2>   
          <p>Prosím, kontaktujte nás vyplnením kontaktného formulára</p>
        </div>
      </div>
      <div class="col-100 text-center" style="background-color: greenyellow">
        <h3>Napíšte nám</h3>
        <form id="contact" method="POST" action="db/spracovanieFormulara.php">
          <input type="text" name="meno" placeholder="Vaše meno" id ="meno" required><br>
          <input type="email" name="email" placeholder="Váš email" id="email" required><br>
          <textarea name="sprava" placeholder="Vaša správa" id="sprava" required></textarea><br>
          <input type="checkbox" name="" id=""  ><label for=""> Súhlasím so spracovaním osobných údajov.</label><br>
          <input type="submit" value="Odoslať" id = "odoslat">
        </form>
        <div id="error" class="text-red">
        </div>
      </div>
    </section>
  </main>
  <?php
    $file_path = "parts/footer.php";
        if(!require($file_path)){
      echo "Failed to include $file_path";
    }
    ?>
<script src="js/app.js"></script>
</body>
</html>
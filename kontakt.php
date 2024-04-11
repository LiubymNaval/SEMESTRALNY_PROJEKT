<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LOMBERX FC</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header class="container main-header">
<div>
<a href="index.php">
<img src="img/FC_Lomberx.png" height="100px" id = "logo">
</a>
</div>
<nav class="main-nav">
<ul class="main-menu" id="main-menu">
<li><a href="index.php">Domov</a></li>
<li><a href="o_nas.php">O nás</a></li>
<li><a href="galeria.php">Galéria</a></li>
<li><a href="kontakt.php">Kontakt</a></li>
<li><a href="recenzie.php">Recenzie</a></li>
</ul>
<a class="hamburger" id="hamburger">
  <i class="fa fa-bars" style="color:greenyellow"></i>
</a>
</nav>
</header>
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
        <form id="contact" action="">
          <input type="text" placeholder="Vaše meno" id ="meno" ><br>
          <input type="email" placeholder="Váš email" id="email"><br>
          <textarea name="" placeholder="Vaša správa" id="sprava"></textarea><br>
          <input type="checkbox" name="" id=""  ><label for=""> Súhlasím so spracovaním osobných údajov.</label><br>
          <input type="submit" value="Odoslať" id = "odoslat">
        </form>
        <div id="error" class="text-red">
        </div>
      </div>
    </section>
  </main>
  <footer class="container bg-black text-greenyellow">
    <div class="row">
    <div class="col-25">
    <h4>Kto sme</h4>
    <p>LOMBERX FC - je mládežnícky futbalový klub, ktorý nielen poskytuje vysoko kvalitnú futbalovú prípravu, 
        ale tiež vytvára pohodlné podmienky pre rozvoj osobnosti každého účastníka.</p>
    </div>
    <div class="col-25">
    <h4>Kontaktujte nás</h4>
    <ul>
    <li><i class="fa fa-envelope" aria-hidden="true"><a
    href="mailto:LomberxFC@gmail.com" style="color: greenyellow">
    LomberxFC@gmail.com</a></i></li>
    <li><i class="fa fa-phone" aria-hidden="true"><a
    href="tel:0909555222" style="color: greenyellow"> 0909555222</a></i></li>
    </ul>
    </div>
    <div class="col-25">
    <h4>Rýchle odkazy</h4>
    <ul>
        <li><a href="index.php" style="color: greenyellow">Domov</a></li>
        <li><a href="o_nas.php" style="color: greenyellow">O nás</a></li>
        <li><a href="galeria.php" style="color: greenyellow">Galéria</a></li>
        <li><a href="kontakt.php" style="color: greenyellow">Kontakt</a></li>
        <li><a href="recenzie.php" style="color: greenyellow">Recenzie</a></li>
    </ul>
    </div>
    <div class="col-25">
    <h4>Nájdete nás</h4>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10614.839764656655!2d18.0910518!3d48.3084298!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xba2bad032d96b960!2sFakulta%20pr%C3%ADrodn%C3%BDch%20vied%20a%20informatiky!5e0!3m2!1ssk!2ssk!4v1669307792855!5m2!1ssk!2ssk" width="300" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
    </div>
    </div>
    <div class="row">
    Created and designed by Liubym Naval
    </div>
</footer>
<script src="js/app.js"></script>
</body>
</html>
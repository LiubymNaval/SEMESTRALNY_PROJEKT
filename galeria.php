<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Galéria</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slider.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
$file_path = "parts/header.php";
if(!require($file_path)){
    echo "Failed to include $file_path";
}
?>
<section class="slides-container">
    <div class="slide fade">
    <img src="img/training.jpg">
    <div class="slide-text">
        Kvalitné tréningy
    </div>
    </div>
    <div class="slide fade">
    <img src="img/Coah_training.jpg">
    <div class="slide-text">
        Najlepší tréneri a metódy
    </div>
    </div>
    <div class="slide fade">
    <img src="img/Tournament match.jpg">
    <div class="slide-text">
        Pravidelné víťazstvá
    </div>
    </div>
    <div class="slide fade">
    <img src="img/team.jpg">
    <div class="slide-text">
        Teamový duch
    </div>
    </div>
    <div class="slide fade">
    <img src="img/FC_Lomberx_player.jpg">
    <div class="slide-text">
        Budúca špičková kariéra
    </div>
    </div>
    <a id="prev" class="prev">❮</a>
    <a id="next" class="next">❯</a>
    </section>
    <?php
    $file_path = "parts/footer.php";
        if(!require($file_path)){
      echo "Failed to include $file_path";
    }
    ?>
<script src="js/app.js"></script>
<script src="js/slider.js"></script>
</body>
</html>
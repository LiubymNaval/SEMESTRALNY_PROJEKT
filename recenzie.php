<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recenzie</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slider.css">
<link rel="stylesheet" href="css/recenzie_style.css">
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
  <div class="col-100 text-center" style="background-color: greenyellow">
  <?php
         include_once "classes/Recenzie.php";
         use recenzie\Recenzie;

         $rec = new Recenzie();
         $rec->getRecenzie();
          ?>
</div>
</section>
</main>
<?php
    $file_path = "parts/footer.php";
        if(!require($file_path)){
      echo "Failed to include $file_path";
    }
    ?>
  <script src="js/recenzie.js"></script>
  <script src="js/app.js"></script>
</body>
</html>
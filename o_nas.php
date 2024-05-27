<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>O nás</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/akordeon.css">
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
      <div class="container">
        <div class="col-100 text-center">
          <h1>Máte otázky?</h1>
          <p>Prosím, zodpovedali sme najčastejšie otázky týkajúce sa nášho mládežníckeho klubu LOMBERX FC</p>
        </div>
      </div>
    </section>
    <section>
    <?php
    include_once "classes/QnA.php";
    use otazkyodpovede\QnA;
    $qna = new QnA();
    $qna->insertQnA();
    $qna->getQnA();     
    ?>
    </section>
  </main>
  <?php
    $file_path = "parts/footer.php";
        if(!require($file_path)){
      echo "Failed to include $file_path";
    }
    ?>
<script src="js/akordeon.js"></script>  
<script src="js/app.js"></script>
</body>
</html>
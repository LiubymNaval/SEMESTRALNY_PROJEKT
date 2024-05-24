<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LOMBERX FC</title>
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

<!-- Formulár na pridanie komentára -->
  <form id="comments" method="POST" action="db/add_recenzie.php">
  <div class="add-review">
  <h2>Pridať recenziu</h2>
  <form id="review-form">
    <div>
      <input type="text" placeholder="Vaše meno" id="username" name="username" required>
    </div>
    <div>
      <textarea id="comment" placeholder="Vaš comentar" name="comment" rows="4" required></textarea>
    </div>
    <div>
      <label for="rating"></label>
      <div class="star-rating" id="rating">
        <span class="star" data-value="5">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="1">&#9733;</span>
      </div>
    </div>
    <input type="submit" value="Odoslať" id = "odoslat">
  </form>
  </div>
  </form>

  <div class="reviews-container">
    <div class="review">
      <div class="user-info">
        <span class="username">Liubym Naval</span>
        <span class="rating"><span class="rating-stars"></span></span>
      </div>
      <p class="comment">Skvelý klub, páči sa mi.</p>
      <button class="edit-btn">Upraviť</button>
    </div>
  </div>
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
</body>
</html>
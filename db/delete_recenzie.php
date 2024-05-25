<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/classes/Recenzie.php');
use recenzie\Recenzie;
session_start();

if (!isset($_SESSION['rola']) || !$_SESSION['user_id']) {
    header('Location: db/login.php');
    exit;
}
$id = $_GET['id']; // Získanie ID z URL
$rec = new Recenzie();
$row = $rec->getRecenzieById(intval($id));
if (!$row) {
    echo 'Recenzia s daným ID nebola nájdená.';
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rec->deleteRecenzie($id);
    header("Location: http://localhost/SEMESTRALNY_PROJEKT/recenzie.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LOMBERX FC</title>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/akordeon.css">
<link rel="stylesheet" href="../css/recenzie_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<main class="container">
      <div class="container">
        <div class="col-100 text-center">
          <h1>Vymazanie recenzie</h1>
          <p>Ste si istí, že chcete recenziu vymazať?</p>
          <div class="reviews-container">
                <div class="review">
                    <div class="user-info">
                        <span class="username"><?php echo $row["meno"]?></span>
                        <span class="rating"><span class="rating-stars" data-rating="<?php echo $row["hodnotenie"]?>"></span></span>
                    </div>
                      <p class="comment"><?php echo $row["komentar"]?></p>
                </div>
            </div>
            <form action="delete_recenzie.php?id=<?php echo $id; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="Vymazať">
            <input type="button" value="Zrušiť" onClick="location.href='../recenzie.php'" style="background-color: white; color: black; padding: 15px 32px;
            width: 250px; font-size: 16px; cursor: pointer">
        </form>
        </div>
      </div>
</main>
<script>
function createStars(element, rating) {
    let stars = "";
    for (let i = 0; i < rating; i++) {
        stars += "&#9733;"; 
    }
    element.innerHTML = stars;
}
document.querySelectorAll(".rating-stars").forEach(function(starsContainer) {
    const rating = starsContainer.getAttribute("data-rating");
    createStars(starsContainer, rating);
});
</script>
</body>
</html>
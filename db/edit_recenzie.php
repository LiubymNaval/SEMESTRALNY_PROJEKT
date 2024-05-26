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
    $hod = $_POST['rating'];
    if(!empty($hod)){
        $rec->updateRecenzie($id, $hod, $_POST['Komentar']);
        header("Location: http://localhost/SEMESTRALNY_PROJEKT/recenzie.php");
        exit;
    }else{
        $hod = $_POST['Hodnotenie'];
        $rec->updateRecenzie($id, $hod, $_POST['Komentar']);
        header("Location: http://localhost/SEMESTRALNY_PROJEKT/recenzie.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editácia</title>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/akordeon.css">
<link rel="stylesheet" href="../css/recenzie_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<main class="container">
    <section>
      <div class="container">
        <div class="col-100 text-center">
          <h1>Editácia recenzie</h1>
        <form action="edit_recenzie.php?id=<?php echo $id; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
        <input type="hidden" name="Hodnotenie" value="<?php echo $row['hodnotenie']; ?>">
        <label for="rating">Vaše hodnotenie</label>
        <div class="star-rating" id="rating">
        <br>
        <span class="star" data-value="5">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="1">&#9733;</span>
        </div>
        <input type="hidden" name="rating" id="ratingValue">
        <br>
        <label for="Komentar">Váš komentár:</label>
        <div style="display:block;padding: 25px 0px;gap:20px;">
            <textarea name="Komentar" id="Komentar"><?php echo $row['komentar']; ?></textarea>
        </div>
        <input type="submit" value="Uložiť">
        <input type="button" value="Zrušiť" onClick="location.href='../recenzie.php'" style="background-color: white; color: black; padding: 15px 32px;
            width: 250px; font-size: 16px; cursor: pointer">
        </form>  
        </div>
      </div>
    </section>
</main>
<script>
    const stars = document.querySelectorAll(".star");
    const ratingValueInput = document.getElementById("ratingValue");
    stars.forEach(star => {
    star.addEventListener("click", function() {
    stars.forEach(s => s.classList.remove("selected"));
    this.classList.add("selected");
    ratingValueInput.value = this.getAttribute("data-value");
    });
    });
</script>
<script src="../js/recenzie.js"></script>
</body>
</html>
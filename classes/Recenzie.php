<?php
namespace recenzie;
error_reporting(E_ALL); //zapnutie chybových hlásení
ini_set("display_errors","Off");
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/classes/Database.php');
require_once(__ROOT__.'/classes/Users.php');
use Database;
use Users;
use PDO;
use Exception;
class Recenzie extends Database {
    protected $connection;
    public function __construct() {
        $this->connect();
        //Použitie gettera na získanie spojenia
        $this->connection = $this->getConnection();
    }
    public function getRecenzieById($id) {
        $sql = "SELECT * FROM comments WHERE ID = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        // Získanie dát
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public function updateRecenzie($id, $hod, $Komentar) {
        $sql = "UPDATE comments SET hodnotenie = :hod, komentar = :Komentar WHERE ID = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':hod', $hod);
        $statement->bindParam(':Komentar', $Komentar);
        $statement->execute();
    }
        
    public function getRecenzie(){
        $sql = "SELECT * FROM comments";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        $user = new Users();
        //Kontrola administrátora
        if ($user->isAdmin()) {
            echo '
            <h1>Recenzie</h1>
            <div class="col-100 text-center"> 
            <h2>Tu nájdete recenzie o našom klube</h2>   
            </div>';
            //Kontrola recenzií
            if ($data) {
              //Získavanie recenzií s možnosťou ich odstránenia administrátorom
              for ($i = count($data) - 1; $i >= 0; $i--) {
                $row = $data[$i];
                    echo '<div class="reviews-container">
                    <div class="review">
                      <span class="rating"><span class="rating-stars" data-rating="' . $row["hodnotenie"] . '"></span></span>
                      <div class="user-info">
                        <span class="username">' .$row["meno"] . '</span>
                        <span class="date">' .$row["datum"] . '</span>
                      </div>
                      <p class="comment">' .$row["komentar"] . '</p>
                      <div class="buttons">
                        <a href="db/delete_recenzie.php?id=' . $row["ID"] . '" style="color: black; background-color: greenyellow;padding: 5px;">Vymazať</a>
                    </div>
                    </div>
                  </div>';
                  //Kód na pridanie hviezdičiek do recenzie
                  echo '<script>
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
                  </script>';  
                }
            } else {
                echo "Neboli nájdené žiadne recenzie";
            } 
        } 
        //Kontrola, či je používateľ zaregistrovaný
        else if($user->isNotAdmin()){
            echo '
            <h1>Recenzie</h1>
            <div class="col-100 text-center"> 
            <h2>Tu nájdete recenzie o našom klube</h2>   
            </div>';
            echo '<!-- Formulár na pridanie komentára -->
            <form id="comments" method="POST" action="db/add_recenzie.php">
            <div class="add-review">
            <h2>Pridať recenziu</h2>
            <form id="review-form">
              <div>
                <textarea id="comment" placeholder="Váš komentár" name="comment" rows="4" required></textarea>
              </div>
              <div>
                <label for="rating"></label>
                <div class="star-rating" id="rating" >
                  <span class="star" data-value="5">&#9733;</span>
                  <span class="star" data-value="4">&#9733;</span>
                  <span class="star" data-value="3">&#9733;</span>
                  <span class="star" data-value="2">&#9733;</span>
                  <span class="star" data-value="1">&#9733;</span>
                </div>
                <input type="hidden" name="rating" id="ratingValue">
              </div>
              <input type="submit" value="Odoslať" id = "odoslat">
            </form>
            </div>
            </form>';
            //Kód na pridanie hviezdičiek do recenzie
            echo '<script>
                const stars = document.querySelectorAll(".star");
                const ratingValueInput = document.getElementById("ratingValue");
    
                stars.forEach(star => {
                star.addEventListener("click", function() {
                    stars.forEach(s => s.classList.remove("selected"));
                    this.classList.add("selected");
                    ratingValueInput.value = this.getAttribute("data-value");
                    });
                });
             </script>'; 
            if ($data) {
              //Získanie používateľskej recenzie
              for ($i = count($data) - 1; $i >= 0; $i--) {
                    $row = $data[$i];
                    //Ak sa recenzia s id používateľa zhoduje s aktuálnym id používateľa, zobrazí sa recenzia s možnosťou jej úpravy a vymazania.
                    if ($row['id_user'] == $_SESSION['user_id']) {
                        echo '<div class="reviews-container">
                        <div class="review">
                          <span class="rating"><span class="rating-stars" data-rating="' . $row["hodnotenie"] . '"></span></span>
                          <div class="user-info">
                            <span class="username">' .$row["meno"] . '</span>
                            <span class="date">' .$row["datum"] . '</span>
                          </div>
                          <p class="comment">' .$row["komentar"] . '</p>
                          <div class="buttons">
                            <a href="db/edit_recenzie.php?id=' . $row["ID"] . '" style="color: black; background-color: greenyellow; padding: 5px;">Editovať</a>
                            <a href="db/delete_recenzie.php?id=' . $row["ID"] . '" style="color: black; background-color: greenyellow;padding: 5px;">Vymazať</a>
                        </div>
                        </div>
                      </div>';
                      //Kód na pridanie hviezdičiek do recenzie
                      echo '<script>
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
                      </script>';                 

                    }else{

                    }
                }
                //Získanie ostatných recenzií
                for ($i = count($data) - 1; $i >= 0; $i--) {
                  $row = $data[$i];
                    if ($row['id_user'] != $_SESSION['user_id']) {
                      echo '<div class="reviews-container">
                      <div class="review">
                        <span class="rating"><span class="rating-stars" data-rating="' . $row["hodnotenie"] . '"></span></span>
                        <div class="user-info">
                          <span class="username">' .$row["meno"] . '</span>
                          <span class="date">' .$row["datum"] . '</span>
                        </div>
                        <p class="comment">' .$row["komentar"] . '</p>
                      </div>
                    </div>';
                    //Kód na pridanie hviezdičiek do recenzie
                      echo '<script>
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
                      </script>';                 

                    }else{

                    }
                }
            } else {
                echo "Neboli nájdené žiadne recenzie";
            }

        } else {
            echo '
            <h1>Recenzie</h1>
            <div class="col-100 text-center"> 
            <h2>Tu nájdete recenzie o našom klube</h2>   
            <h4>Ak chcete pridať svoju recenziu, musíte sa zaregistrovať na našej stránke</h4> 
            </div>';
            //Získanie recenzií
            if ($data) {
              for ($i = count($data) - 1; $i >= 0; $i--) {
                $row = $data[$i];
                    echo '<div class="reviews-container">
                    <div class="review">
                      <span class="rating"><span class="rating-stars" data-rating="' . $row["hodnotenie"] . '"></span></span>
                      <div class="user-info">
                        <span class="username">' .$row["meno"] . '</span>
                        <span class="date">' .$row["datum"] . '</span>
                      </div>
                      <p class="comment">' .$row["komentar"] . '</p>
                    </div>
                  </div>';
                  //Kód na pridanie hviezdičiek do recenzie
                  echo '<script>
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
                  </script>';  
                }
            } else {
                echo "Neboli nájdené žiadne recenzie";
            }
        }
        // Uzatvorenie spojenia
            $this->connection = null;
    }
    public function deleteRecenzie($id) {
        $sql = "DELETE FROM comments WHERE ID = :id";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }
    public function ulozitKomentar($id_user,$meno,$hodnotenie, $komentar, $datum) {
      $sql_check = "SELECT * FROM comments WHERE id_user = :id_user";
      $statement_check = $this->connection->prepare($sql_check);
      $statement_check->execute(array(':id_user' => $id_user));
      $existing_comment = $statement_check->fetch();
      //Kontrola, ak recenzia už existuje, zakázať možnosť pridania novej
      if ($existing_comment) {
          return false;
      }

        $sql = "INSERT INTO comments (id_user,meno, hodnotenie, komentar, datum) 
                VALUES (:id_user,:meno, :hodnotenie, :komentar , :datum)";
        $statement = $this->connection->prepare($sql);
        try {
            $insert = $statement->execute(array(':id_user' => $id_user,':meno' => $meno,':hodnotenie' => $hodnotenie,':komentar' => $komentar, ':datum' => $datum));
            http_response_code(200);
            return $insert;
        } catch (\Exception $exception) {
            http_response_code(500);
            return false;
        }
    }
    
}
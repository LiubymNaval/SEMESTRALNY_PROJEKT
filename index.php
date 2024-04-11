<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LOMBERX FC</title>
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
<section class="container"></section>
<section class="container">
  <div class="row">
    <div class="col-50 text-center">
        <img src="img/FC_Lomberx.png" height="400px" id = "logo_1">
    </div>
    <div class="col-50">
        <h2>LOMBERX FC - je mládežnícky futbalový klub, ktorý nielen poskytuje vysoko kvalitnú futbalovú prípravu, 
        ale tiež vytvára pohodlné podmienky pre rozvoj osobnosti každého účastníka.</h2>
    </div>
    </div>
    <div class="row">
    <div class="col-50">
        <h4>Trénerský tím LOMBERX FC pozostáva z kvalitných expertov vo futbalovom priemysle, 
            ktorí majú mnohoročné skúsenosti s prácou v mládežníckych tímoch. 
            Ponúkajú individuálny prístup k každému účastníkovi, pomáhajúc im rozvíjať techniku hry, taktiku, fyzickú kondíciu a mentálne schopnosti.</h4>
        <h4>Program tréningov zahŕňa nielen futbalové lekcie, ale aj intenzívne tréningy zamerané na rozvoj rýchlosti, vytrvalosti, sily a flexibility.
             Súčasťou sú aj hodiny taktiky, čítania hry a rozhodovania sa o strategických rozhodnutiach na ihrisku.</h4>
    </div>
    <div class="col-50">
        <img src="img/Coah_training.jpg" height="450px" id = "logo_2">
    </div>
    </div>
    <div class="row">
        <div class="col-50">
            <img src="img/Tournament match.jpg" height="440px" id = "logo_2">
        </div>
        <div class="col-50">
            <h4>Účasť na súťažiach je neoddeliteľnou súčasťou klubového programu. 
                LOMBERX FC aktívne participuje v rôznych turnajoch a šampionátoch na miestnej, regionálnej a národnej úrovni.
                 To poskytuje účastníkom klubu príležitosť vyskúšať si svoje schopnosti v reálnych súťažiach a získať cenné skúsenosti pod vedením trénerov.</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-50">
            <h4>Okrem športových tréningov sa klub venuje aj rozvoju osobnosti tínedžerov. 
                Pomáha formovať líderské kvality, rozvíjať zodpovednosť, spoluprácu a úctu k spoluhráčom.</h4>
            <h4>LOMBERX FC vytvára jedinečnú atmosféru, v ktorej tínedžeri nielen rozvíjajú svoje futbalové schopnosti, 
                ale aj sa formujú ako osobnosti. Klub je hrdý na svojich absolventov, 
                z ktorých mnohí sa stali profesionálnymi futbalistami alebo pokračujú vo úspešnom štúdiu, 
                so cennými skúsenosťami a zručnosťami získanými v LOMBERX FC.</h4>    
        </div>
        <div class="col-50">
            <img src="img/team.jpg" height="450px" width="700px" id = "logo_2">
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
<script src="js/slider.js"></script>
</body>
</html>
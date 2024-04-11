<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LOMBERX FC</title>
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
    <div class="accordion">
      <div class="question">Čo je LOMBERX FC?</div>
      <div class="answer">LOMBERX FC - je mládežnícky futbalový klub, 
        ktorý poskytuje vysoko kvalitnú futbalovú prípravu
        a vytvára komfortné podmienky pre rozvoj osobnosti každého účastníka.</div>
    </div>
    <div class="accordion">
      <div class="question">Aký trénerský tím je v klube?</div>
      <div class="answer">Trénerský tím LOMBERX FC pozostáva z kvalitných odborníkov vo futbalovom priemysle
         s mnohoročným skúsenostiam práce s mládežníckymi tímami.</div>
    </div>
    <div class="accordion">
      <div class="question">Čo zahŕňa tréningový program v klube?</div>
      <div class="answer">Program zahŕňa futbalové lekcie, intenzívne tréningy na zlepšenie rýchlosti,
         vytrvalosti, sily, tréningy taktiky a rozhodovania sa na ihrisku.</div>
    </div>
    <div class="accordion">
      <div class="question">V akých súťažiach sa zúčastňuje LOMBERX FC?</div>
      <div class="answer">Klub aktívne súťaží v rôznych turnajoch a šampionátoch na miestnej, regionálnej a národnej úrovni.</div>
    </div>
    <div class="accordion">
      <div class="question">Aký je zameranie klubu okrem športových tréningov?</div>
      <div class="answer">Okrem športových tréningov sa klub venuje aj rozvoju osobnosti teenagerov, pomáha formovať vodcovské schopnosti a zodpovednosť.</div>
    </div>
    <div class="accordion">
      <div class="question">Ako LOMBERX FC pomáha svojim účastníkom po skončení výučby?</div>
      <div class="answer"> LOMBERX FC nie len ukončuje vzdelávanie, ale aj pokračuje v podpore svojich účastníkov v ich ďalších krokoch. 
        Poskytujeme možnosti pre ďalšie profesionálne rozvoj, smerujúc absolventov k profesionálnym futbalovým klubom alebo futbalovým akadémiám. 
        Veríme, že naši účastníci vďaka znalostiam a zručnostiam získaným v klube LOMBERX FC môžu úspešne dosahovať svoje ciele vo svojom profesionálnom športe.</div>
    </div>
    <div class="accordion">
      <div class="question">Ako sa pripojiť k tímu LOMBERX FC?</div>
      <div class="answer">Aby ste sa pripojili k tímu LOMBERX FC, môžete vyplniť špeciálny formulár na našej webovej stránke v sekcii "Kontakty" 
        a odoslať nám svoj email. My sa s vami spojíme a odpovieme vám na váš email. Tiež nás môžete kontaktovať prostredníctvom e-mailu alebo telefonicky na číslo,
         ktoré nájdete na spodnej časti našej webovej stránky.</div>
    </div>
  </section>
  </div>
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
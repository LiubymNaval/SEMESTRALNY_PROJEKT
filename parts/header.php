<?php
include_once "nav.php";
use navig\Nav;
$nav = new Nav();

$menu = $nav->getMenuData("header");
?>
<header class="container main-header">
<div>
<a href="<?php echo $menu['home']['path']; ?>">
<img src="img/FC_Lomberx.png" height="100px" id = "logo">
</a>
</div>
<nav class="main-nav">
<ul class="main-menu" id="main-menu">
<?php $nav->printMenu($menu); ?> 
<?php $nav->printLoginRegister(); ?> 
</ul>
<a class="hamburger" id="hamburger">
<i class="fa fa-bars" style="color:greenyellow"></i>
</a>
</nav>
</header>


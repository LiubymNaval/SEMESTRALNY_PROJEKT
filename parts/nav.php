<?php 
function validateMenuType(string $type): bool
{
    $menuTypes = [
        'header',
        'footer'
    ];
    if (in_array($type, $menuTypes)) {
        return true;
    } else {
        return false;
    }
}

function getMenuData(string $type): array
{
    $menu = [];
    if (validateMenuType($type)) {
        if ($type === "header") {
            $menu = [
                'home' => [
                    'name' => 'Domov',
                    'path' => 'index.php',
                ],
                'o_nas' => [
                    'name' => 'O nás',
                    'path' => 'o_nas.php',
                ],
                'galeria' => [
                    'name' => 'Galéria',
                    'path' => 'galeria.php',
                ],
                'kontakt' => [
                    'name' => 'Kontakt',
                    'path' => 'kontakt.php',
                ],
                'recenzie' => [
                    'name' => 'Recenzie',
                    'path' => 'recenzie.php',
                ]
            ];
        }
    }
    return $menu;
}
function printMenu(array $menu)
{
    foreach ($menu as $menuName => $menuData) {
        echo '<li><a href="' . $menuData['path'] . '">' . $menuData['name'] . '</a></li>';
    }
}

function printLoginRegister(): void{
    session_start();
    if (isset($_SESSION['login'])) {
        echo '<li> <a href= db/logout.php >Prihlásený:' . $_SESSION['login'] . ' (' . $_SESSION['rola'] . ')'.'</a> </li> ';
    } else {
        echo '<li> <a href="profil.php">Prihlásiť/Registrovať</a> </li>';
    }
}
?>
<?php

if (isset($_SESSION['user'])) {

    $userIcon = DIR_IMG . '/user/' . $_SESSION['user']['image'];

    !file_exists($userIcon) && $userIcon = DIR_IMG . '/header/user_default.png';

} else {
    $userIcon = DIR_IMG . '/header/user_default.png';
}

?>

<header class="main-landingpage-header">
    <nav>
        <a href="?page=home">Home</a>
        <a href="">Sobre</a>
    </nav>

    <a href="?page=login">
        <img src="<?= $userIcon ?>" alt="Ícone do Usuário">
    </a>
</header>
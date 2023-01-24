<?php

require_once(__DIR__ . '/../vendor/autoload.php');

error_reporting(E_ALL);
ini_set("display_errors", 1);

ob_start();

session_start();

require_once(__DIR__ . '/config/environment.php');

$page = isset($_GET['page']) ? $_GET['page'] : 'menu';
$action = isset($_GET['action']) ? $_GET['action'] : 'main';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Title -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.png" type="image/x-icon">
    <title>FlashFood</title>

    <!-- Meta TAGs -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= DIR_CSS ?>/reset.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?= DIR_CSS ?>/cardapio/style.css">   

    <link rel="stylesheet" href="<?= DIR_CSS ?>/carrinho/style.css">

    <!-- Não importar a baixo dessas duas! Importe acima -->
    <link rel="stylesheet" href="<?= DIR_CSS ?>/style.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="<?= DIR_CSS ?>/fonts/style.css">

</head>
<body>
    <div id="container">
        <header class="header-responsivo">
            <div class="header-search-wrapper">
                <i class="fa-solid fa-magnifying-glass header-button-search"></i>
                <input type="text" placeholder="Pesquisar">
            </div>

            <img src="<?= DIR_IMG ?>/header/logo-responsivo.png" alt="Logo do Sistema Responsivo">

            <div class="header-menu-wrapper">
                <i id="header-burguer-icon" class="fa-solid fa-bars"></i>

                <div id="modal-header-menu" class="items-menu">

                    <div id="header-menu-close"></div>
                    
                    <div class="modal-wrapper">
                        <div class="title-wrapper">
                            <h2>Páginas</h2>
                            <i id="close-modal-header" class="fa-solid fa-xmark"></i>
                        </div>

                        <ul>
                            <li>
                                <a href="?page=menu">Cardápio</a>
                            </li>
                            <li>
                                <a href="?page=cart">Carrinho</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <?php

            if (file_exists(__DIR__ . "/pages/$page/$action.php")) {
                require_once(__DIR__ . "/pages/$page/$action.php");
            } else {
                header("Location: ?page=menu");
            }

            if (!isset($page)) {
                header("Location: ?page=menu");
            }

        ?>

        <footer>
            <div>
                a*
            </div>
        </footer>
    </div>

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Input Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js" integrity="sha512-jTgBq4+dMYh73dquskmUFEgMY5mptcbqSw2rmhOZZSJjZbD2wMt0H5nhqWtleVkyBEjmzid5nyERPSNBafG4GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Mask Money -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Vanilla -->
    <script>
        const BASE_URL = "http://localhost/flashfood/response";
    </script>

    <?php if (file_exists(__DIR__ . "/assets/js/$page.js")): ?>
    
        <script src="<?= DIR_JS ?>/<?= $page ?>.js"></script>
    
    <?php endif ?>
    
    <script src="<?= DIR_JS ?>/script.js"></script>
</body>
</html>
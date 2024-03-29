<?php

require_once(__DIR__ . '/vendor/autoload.php');

error_reporting(E_ALL);
ini_set("display_errors", 1);

ob_start();

session_start();

require_once(__DIR__ . '/config/environment.php');

date_default_timezone_set('America/Sao_Paulo');

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
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

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="<?= DIR_CSS ?>/reset.css">

    <link rel="stylesheet" href="<?= DIR_CSS ?>/style.css">

    <!-- Components -->
    <link rel="stylesheet" href="<?= DIR_CSS ?>/components/formLogin.css">
    <link rel="stylesheet" href="<?= DIR_CSS ?>/components/buttonLogin.css">
    <link rel="stylesheet" href="<?= DIR_CSS ?>/components/mainTitle.css">
    <link rel="stylesheet" href="<?= DIR_CSS ?>/components/mainModal.css">

    <?php if (file_exists(__DIR__ . '/assets/css/' . $page . '/' . $action . '.css')): ?>
        <link rel="stylesheet" href="<?= DIR_CSS . '/' . $page . '/' . $action . '.css' ?>">
    <?php endif; ?>

    <?php if (file_exists(__DIR__ . '/assets/css/' . $page . '/style.css')): ?>
        <link rel="stylesheet" href="<?= DIR_CSS . '/' . $page . '/style.css' ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?= DIR_CSS ?>/login/responsive.css">
    <link rel="stylesheet" href="<?= DIR_CSS ?>/home/responsive.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="<?= DIR_CSS ?>/fonts/style.css">

</head>
<body>
    <div id="container-landingpage">
        <?php

            if (file_exists(__DIR__ . "/pages/$page/$action.php")) {
                require_once(__DIR__ . "/pages/$page/$action.php");
            } else {
                header("Location: ?page=home");
            }

            if (!isset($page)) {
                header("Location: ?page=home");
            }

        ?>
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
        const BASE_URL = "<?= SERVER_HOST ?>";
    </script>

    <?php if (file_exists(__DIR__ . "/assets/js/$page.js")): ?>
    
        <script src="<?= DIR_JS ?>/<?= $page ?>.js"></script>
    
    <?php endif ?>
    
    <script src="<?= DIR_JS ?>/menu-burguer.js"></script>

    <script src="<?= DIR_JS ?>/script.js"></script>
</body>
</html>
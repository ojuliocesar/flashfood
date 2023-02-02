<?php

// define('ENVIRONMENT', 'development'), feito manualmente como condição para as constantes de conexão com o banco;
define('ENVIRONMENT', 'development');

// Caso o projeto esteja dentro de uma pasta e não na raiz do www|htdocs
define('DIR_ROOT', 'flashfood/kitchen');

// Define o nome do servidor
define('DIR_SERVER', $_SERVER['SERVER_NAME']);

define('DIR_DOCUMENT', $_SERVER['DOCUMENT_ROOT']);

// Define se a porta é https ou http
define('DIR_PROTOCOL', ($_SERVER['SERVER_PORT'] != '80') ? 'https' : 'http');

// Monta a url -- http://localhost/flashfood
define('DIR_PATH', DIR_PROTOCOL . '://' . DIR_SERVER . '/' . DIR_ROOT);

define('SERVER_HOST', DIR_PROTOCOL . '://' . DIR_SERVER . '/' . 'flashfood');

// Define caminhos
define('DIR_CSS', DIR_PATH . '/assets/css');
define('DIR_JS', DIR_PATH . '/assets/js');
define('DIR_IMG', DIR_PATH . '/assets/images');
define('DIR_FNT', DIR_PATH . '/assets/fonts');

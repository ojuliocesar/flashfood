<?php

use Model\User;

$user = new User;

if 
(
    !key_exists('name', $_POST) || 
    !key_exists('email', $_POST) || 
    !key_exists('role', $_POST) || 
    !key_exists('birthdate', $_POST)
) {
    $response = array(
        'response' => false,
        'message' => 'Informações insuficientes para a Atualização!'
    );

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit();
}

$isEmpty = false;

foreach($_POST as $postItem) {
    if ($postItem != '0' && !is_array($postItem)) {
        if (empty(trim($postItem))) {
            $isEmpty = true;
        }
    }
}

if ($isEmpty) {

    $response = array(
        'response' => false,
        'message' => 'Digite as informações corretamente!'
    );

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit();
}

if (!empty($_FILES['image']['name'])) {
    
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {

        $response = array(
            'response' => false,
            'message' => 'Formato de arquivo inválido!'
        );
    
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    }

    $data['image'] = $_FILES['image'];
    $data['image']['extension'] = $extension;
}

$data['name'] = filter_input(INPUT_POST, 'name');
$data['email'] = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$data['role'] = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT);
$data['birthdate'] = $_POST['birthdate'];

$data['password'] = sha1(date('dmY', strtotime($data['birthdate'])));

$readByEmail = $user->readByEmail($data['email']);

if ($readByEmail) {
    
    $readById = $user->readById($_POST['userId']);

    if ($readByEmail['email'] != $readById['email']) {

        $response = array(
            'response' => false,
            'message' => 'Esse E-mail já está cadastrado! Insira outro e tente Novamente.'
        );
    
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();
    
    }
}

$update = $user->update($data, $_POST['userId']);

if ($update) {

    $dataUser = $user->loginUser($data['email'], $data['password']);
    
    if ($dataUser) {
        
        $_SESSION['flashfood']['user'] = $dataUser;

        $response = [
            'response' => true,
            'message' => 'Usuário atualizado com Sucesso!'
        ];
    
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        exit();

    }
}
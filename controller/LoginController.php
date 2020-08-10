<?php

if($_SESSION['user']) {
    header('Location /dash');
    die();
}

$login = new Login();

if($_SESSION['cadastro']) {
    unset($_SESSION['cadastro']);
    $message_success = 'Cadastro efetuado com sucesso, hora de logar ;)';
    include 'view/login.php';
} elseif(isset($_POST['email']) && isset($_POST['password'])) {
    $get = $login->checkLogin($_POST['email'], $_POST['password']);
    if($get) {
        $_SESSION['user'] = $get['id'];
        if(!empty($get['admin'])) {
            $_SESSION['admin'] = $get['admin'];
        }
        header('Location: /dash');
        die();
    } else {
        $message_error = 'Email ou senha incorretos!';
        include 'view/login.php';
    }
} else {
    include 'view/login.php';
}
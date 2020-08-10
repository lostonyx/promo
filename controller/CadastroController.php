<?php

if($_SESSION['user']) {
    header('Location /dash');
    die();
}

$main = new Main();

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['name']) && isset($_POST['phone'])) {
    $get = $main->checkEmailExist($_POST['email']);
    if($get) {
        $message_error = 'Já existe um cadastro nesse email!';
        include 'view/cadastro.php';
    } elseif($_POST['password'] != $_POST['confirmpassword']) {
        $message_error = 'Confirmação de senha incorreta!';
        include 'view/cadastro.php';
    } else {
        if($main->userRegister($_POST['email'], md5($_POST['password']), $_POST['name'], $_POST['phone'])) {
            $_SESSION['cadastro'] = 'yes';
            header('Location: /login');
            die();
        } else {
            $message_error = 'Ocorreu um erro, contacte um administrador!';
            include 'view/cadastro.php';
        }
    }
} else {
    include 'view/cadastro.php';
}
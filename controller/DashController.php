<?php

if(!$_SESSION['user']) {
    header('Location: /login');
    die();
}

$main = new Main();

if($_POST['pincode']) {
    $reply = $main->getPinCode($_POST['pincode']);
    if(($reply) && (!$reply['userid'])) {
        if($main->generateNumbers($_POST['pincode'], $_SESSION['user'])) {
            $message_success = 'PinCode ativado!';
        } else {
            $message_error = 'Ocorreu um erro ao ativar o PinCode, contacte um administrador!';
        }
    } elseif($reply['userid']) {
        $message_error = 'PinCode já utilizado!';
    } else {
        $message_error = 'PinCode não encontrado!';
    }
}

$numbers = $main->getNumbers($_SESSION['user']);
include 'view/dash.php';
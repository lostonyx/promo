<?php

if(!$_SESSION['user']) {
    header('Location: /login');
    die();
}
if(!$_SESSION['admin']) {
    header('Location: /dash');
    die();
}

$admin = new Admin();

if(isset($_POST['draw'])) {
    $work = $admin->drawNow();
    $message_success = 'Números sorteados!';
} elseif(isset($_POST['clear'])) {
    if($admin->clearAll()) {
        $message_success = 'Sistema limpo, hora de sortear novamente ;)';
    } else {
        $message_error = 'Ocorreu um erro ao limpar o sistema, contacte um administrador!';
    }
} elseif($_POST['pincode']) {
    if($admin->generatePinCode($_POST['pincode'])) {
        $message_success = 'PinCode '.$_POST['pincode'].' gerado com sucesso!';
    } else {
        $message_error = 'Ocorreu um erro ao gerar o PinCode '.$_POST['pincode'];
    }
}



$numbers = $admin->getNumbers();
include 'view/admin.php';

?>
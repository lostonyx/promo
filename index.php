<?php

$url = explode('/', $_GET['url']);
if($url['0'] == 'index.php') {
    $main = '';
} else {
    $main = strtolower($url['0']);
}

session_start();

if(empty($main) || $main == 'index') {
    include 'controller/IndexController.php';
} elseif(file_exists('controller/'.ucfirst($main).'Controller.php')) {
    include 'model/autoload.php';
    $mysql = new mysql();
    $login = new Login();
    include 'controller/'.ucfirst($main).'Controller.php';
} else {
    include 'view/404.php';
}


?>
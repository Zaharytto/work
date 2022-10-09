<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/src/core.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/route/main_menu.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/include/success_message.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/include/error_message.php';

$displayLogin = '';
$displayPassword = '';

if(isset($_POST['send'])) {
    if (array_search($_POST['login'], $usersLogin) === array_search($_POST['password'], $usersPass)) {
        if (in_array($_POST['login'], $usersLogin) && in_array($_POST['password'], $usersPass)) {
            echo $success; 
        } else {
            echo $error;
            $displayLogin = $_POST['login'];
            $displayPassword = $_POST['password'];
        }
    } else {
        echo $error;
        $displayLogin = $_POST['login'];
        $displayPassword = $_POST['password'];
    }    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "/mywebsite/assets/style.css">
    <title>Document</title>
    <div class = "menu-header">
        <ul>
            <?= showMenu(arraySort($mainMenu)); ?>  
        </ul>
    </div>

    <div>
        <a href="/mywebsite/index.php?login=yes">Авторизация</a>
    </div>

        <?php if (isset($_GET['login'])) :?>                               

        <form action ="/mywebsite/index.php?login=yes" method = "post">    
            <p><strong>Логин</strong>:</p>
            <input type = "text" name = "login" value = "<?= $displayLogin; ?>">
   
            <p><strong>Пароль</strong>:</p>
            <input type = "text" name = "password" value = "<?= $displayPassword; ?>">

            <input type = "submit" name = "send">
        </form>
    <?php endif; ?>


</head>

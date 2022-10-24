<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/src/core.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/route/main_menu.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/include/success_message.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/include/error_message.php';



$displayLogin = '';
$displayPassword = '';
if(isset($_POST['send'])) {
    
    $login = $_POST['login'];
    $password = $_POST['password'];

    $hash = '$2y$10$.vB1woH74N3ypvk.KNb7m.CB0DWj72vt.4h0IxiwecYfoaUhe3Dfq';

    if (password_verify($password, $hash)) {

        $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', 'root');
        $result = $pdo -> prepare("SELECT * FROM `users` WHERE `login` = :login");
        $result -> execute(['login' => $login]);
    
        if ($result -> rowCount() > 0) {
            session_start();
            setcookie('login', $_POST['login'], time() + 60 * 60 * 24 * 30, '/mywebsite');
            $_SESSION['login'] = $_POST['login'];
            echo $success;        
        }
    } else {
        $displayLogin = $_POST['login'];
        $displayPassword = $_POST['password'];
        echo $error;
    }
    $pdo = null;
    $result = null;
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
        <?php if (validAuthorization ()) :?>
            <?= showMenu(arraySort($mainMenu, 'title', SORT_ASC)); ?>  
        <?php else :?>
            <?= showMenuBeforeAuthorization(arraySort($mainMenu, 'title', SORT_ASC)); ?>
        <?php endif; ?>
        </ul>
    </div>

    <div>
        <?php if (validAuthorization ()) :?>
            <a href="/mywebsite/src/exitProfile.php">Выход</a>
        <?php else :?>
            <a href="/mywebsite/index.php?login=yes">Авторизация</a>
        <?php endif; ?>
    </div>

        <?php if (isset($_GET['login'])) :?>                               

        <form action ="/mywebsite/index.php?login=yes" method = "post">    
            <p><strong>Логин</strong>:</p>
            <input type = "text" name = "login" value = "<?= $displayLogin = !empty($_COOKIE['login']) ? $_COOKIE['login'] : ''; ?>">
   
            <p><strong>Пароль</strong>:</p>
            <input type = "text" name = "password" value = "<?= $displayPassword; ?>">

            <input type = "submit" name = "send">
        </form>
    <?php endif; ?>


</head>

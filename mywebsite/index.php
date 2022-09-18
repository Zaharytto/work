<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/data/users.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/data/passwords.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/include/success_message.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/include/error_message.php';

$displayLogin = '';
$displayPassword = '';

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
}

if(isset($_POST['send'])) { 
    foreach ($usersLogin as $key => $val) {
        if ($usersLogin[$key] === $login && $usersPass[$key] === $password) {
            echo $success;
            $displayLogin = '';
            $displayPassword = '';
            break;
        } else {
            echo $error;
            $displayLogin = $login;
            $displayPassword = $password;
            break;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
<div>
    <a href="/mywebsite/index.php?login=yes">Авторизация</a>
</div>

<?php if (isset($_GET['login'])) :?>                               

<form action ="/mywebsite/index.php?login=yes" method = "post">    
   <p>
       <p><strong>Логин</strong>:</p>
       <input type = "text" name = "login" value = "<?= $displayLogin; ?>">
   </p>

   <p>
       <p><strong>Пароль</strong>:</p>
       <input type = "text" name = "password" value = "<?= $displayPassword; ?>">
   </p>
   
   <p>
       <input type = "submit" name = "send">
   </p>

</form>

<?php endif; ?>

</body>
</html>
<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/data/users.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/data/passwords.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/include/success_message.php';


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


<?php if ($_GET['login'] && $_GET['login'] ==='yes') :?>

 <form action ="/mywebsite/index.php?login=yes" method = "post">    
    <p>
        <p><strong>Логин</strong>:</p>
        <input type = "text" name = "login">
    </p>

    <p>
        <p><strong>Пароль</strong>:</p>
        <input type = "text" name = "password">
    </p>
    
    <p>
        <input type = "submit" name = "send">
    </p>

</form>


<?php endif; ?>


</body>
</html>
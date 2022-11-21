<?php
var_dump($_POST);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AuthorizationAndRegistration</title>
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" text= "text/css"  href="/TZ2/assets/style.css">
</head>
<body>

    <form id="form-create-user" >
        <div class="form-element">
            <label>Логин</label>
            <input class= 'login' type="text" name="login" value = "" required/>
        </div>

        <div class="form-element">
            <label>Пароль</label>
            <input class= 'password' type="password" name="password" value = "" required/>
        </div>

        <div class="form-element">
            <label>Подтверждение пароля</label>
            <input class= 'confirm_password' type="password" name="confirm_password" value = "" required/>
        </div>

        <div class="form-element">
            <label>Email</label>
            <input class= 'email' type="email" name="email" value = "" required/>
        </div>

        <div class="form-element">
            <label>Имя</label>
            <input class= 'name' type="text" name="name" value = "" required/>
        </div>

        <button class= 'registration' type="submit" name="register">Регистрация</button>
    </form>


    <script>
        $(document).ready(function(){
            $("#form-create-user").submit(function(e){
                e.preventDefault();

                var loginReg = $('input.login').val();
                var passwordReg = $('input.password').val();
                var confirm_passwordReg = $('input.confirm_password').val();
                var emailReg = $('input.email').val();
                var nameReg = $('input.name').val();

                $.ajax({
                  method: "POST",
                  url: "/TZ2/src/UserRepository.php",
                  data: { login: loginReg, password: passwordReg, confirm_password: confirm_passwordReg, email: emailReg, name: nameReg }
                })

                $('input.login').val('');
                $('input.password').val('');
                $('input.confirm_password').val('');
                $('input.email').val('');
                $('input.name').val('');
            })
            });;
    </script>


    
</body>
</html>
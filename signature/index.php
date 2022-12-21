<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signature</title>
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" text= "text/css"  href="/signature/assets/style.css">
</head>
<body>
    <form id="signature">
    <h1>Введите текст для подписи</h1>
        <div>
            <textarea id= "message" name="message" cols="30" rows="10"></textarea>
        </div>

        <div>
            <input class="FullName" type="text" name="FullName" placeholder= "Иванов И.И." required>
        </div>

        <select id="select" size="1">
            <option id="red" name="red" value="red">Красная подпись</option>
            <option id="green" name="green" value="green">Зелёная подпись</option>
        </select>

        <div>
            <input type="submit" name="send" value="Подписать">
        </div>
    </form>

    <script>
        $(document).ready(function(){
            $("#signature").submit(function(e){
                e.preventDefault();

                var fullName = $('input.FullName').val();
                var message = document.getElementById("message").value;
                var select = document.getElementById("select").value;

             
                $.ajax({
                  method: "POST",
                  dataType: 'json',
                  url: "/signature/app/createSignature.php",
                  data: {FullName: fullName, message: message, select: select},
                  success: function (data) { 
                    if (data.status === true) {
                        alert(data.message);
                    } else {
                        alert(data.message);     
                    }
                }
                  
                })

            })
        });
    </script>
    
</body>
</html>
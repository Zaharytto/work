<?php


$maximumImageSize = 2097152;
$types = ['image/jpeg', 'image/png', 'image/jpg'];

if (isset($_POST['upload'])) {
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/mywebsite/route/gallery/upload/';
    // для загрузки нескольких файлов использую foreach, в input name myfile добавил [] 
    foreach ($_FILES['myfile']['name'] as $key => $value) {
        if(!empty($_FILES['myfile']['error'][$key])){
            echo "Произошла ошибка!";
        } else {
            //проверка формата
            if (!in_array($_FILES['myfile']['type'][$key], $types)) {
                echo "Это не картинка!";
            } else {
                //проверка размера файла
                if ($_FILES['myfile']['size'][$key] > $maximumImageSize) {
                    echo "Размер изображения превышает 2 МБ!";
                } else {
                    //проверка на количество файлов
                    if (count($_FILES['myfile']['name']) > 5){
                        echo "Нельзя загружать больше 5 картинок!";
                        break;
                    }else{
                        // проверка имени и загррузка
                        $name = preg_replace('/[^. \w-]/', '_', $_FILES['myfile']['name'][$key]);
                        move_uploaded_file($_FILES['myfile']['tmp_name'][$key], $uploadPath . $name);
                    }
                }
            }
        }
    }
}

?>


<form enctype = "multipart/form-data" method = "POST" action = "<?= $_SERVER['PHP_SELF'] ?>">
    <span>Загрузите файл:</span>
    <input type = "file" name = "myfile[]" multiple="true">
    <input type = "submit" name = "upload" value = "Загрузить">
</form>

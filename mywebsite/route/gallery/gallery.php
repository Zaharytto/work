<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/templates/header.php';


$dir1 = scandir($_SERVER['DOCUMENT_ROOT'] . '/mywebsite/route/gallery/upload');
$dir2 = ['.' , '..'];
$dir = array_diff($dir1 , $dir2);

if (isset($_POST['delete'])) {
    if (isset($_POST['delete_one'])) {
        foreach ($_POST['delete_one'] as $key => $value) {
            if ($_POST['delete_one'][$key] === $dir[$key]) {
                $pictureDelete = $dir[$key];
                unlink ($_SERVER['DOCUMENT_ROOT'] . "/mywebsite/route/gallery/upload/$pictureDelete");
            }
        }
    } 
    if (isset($_POST['delete_all'])) {
        foreach ($dir as $value) {
            unlink ($_SERVER['DOCUMENT_ROOT'] . "/mywebsite/route/gallery/upload/$value");
        }
    }
}
    
?>

<body>
    <div>
        <a href="/mywebsite/route/gallery/create/image_upload_form.php">Добавить изображение</a>
    </div>

<form action ="/mywebsite/route/gallery/gallery.php" method = "POST">
    <ul>
    <?=showPicture ()?>
    </ul>

    <input type="checkbox" name="delete_all" value="all">Удалить всё
    <input type="submit" name = "delete" value="Удалить">
</form>
</body>


<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/templates/footer.php';
?>
    
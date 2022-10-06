<?php


function showPicture ()
{
    $picture = '';
    $galleryWithDirectory = scandir($_SERVER['DOCUMENT_ROOT'] . '/mywebsite/route/gallery/upload');
    $directory = ['.' , '..'];
    $gallery = array_diff($galleryWithDirectory , $directory); 
    foreach ($gallery as $key => $namePicture) {
        $delete = "<input type='checkbox' name='delete_one[$key]' value='$namePicture'>Удалить";
        $date = date("F d Y H:i:s.", filectime($_SERVER['DOCUMENT_ROOT'] . "/mywebsite/route/gallery/upload/$namePicture"));
        $picture .= "<li><img src='/mywebsite/route/gallery/upload/$namePicture'></li>" . $date . $delete;   
    }
    return $picture;
}

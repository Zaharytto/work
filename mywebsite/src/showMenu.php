<?php



function showMenu($array, $html)
{
    $html = '';

    foreach ($array as $value) {
        $path = $value['path'];
        $title = $value['title'];
        $class = '';
        if ($_SERVER['PHP_SELF'] === $value['path']) {
            $class = 'text-decoration:underline';
        }
        $html = "<li> <a href =$path style =$class>$title</a></li>";
    }
    return $html;
}




/*
function showMenu($array)
{
    foreach ($array as $value) {
        ?><li> <a href =<?=$value['path']?> <?php if($_SERVER['PHP_SELF'] === $value['path']) {echo 'style = "text-decoration:underline"';}?>><?=$value['title']?></a></li><?php
    }
}
*/

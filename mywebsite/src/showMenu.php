<?php

function showMenu ($array)
{
    $html = '';

    foreach ($array as $value) {
        $path = $value['path'];
        $title = $value['title'];
        $class = '';
        if ($_SERVER['PHP_SELF'] === $value['path']) {
            $class = 'text-decoration:underline';
        }
        $html .= "<li> <a href =$path style =$class>$title</a></li>";
    }
    return $html;
}

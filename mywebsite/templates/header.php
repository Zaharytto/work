<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/src/core.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/mywebsite/rote/main_menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href = "/mywebsite/assets/style.css">
    <title>Document</title>
    <div class = "menu-header">
        <ul>
        <?=showMenu(arraySort($mainMenu))?>
        </ul>
    </div>
</head>

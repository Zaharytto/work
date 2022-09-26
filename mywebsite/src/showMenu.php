<?php


function showMenu($array)
{
    foreach ($array as $value) {
        ?><li> <a href =<?=$value['path']?> <?php if($_SERVER['PHP_SELF'] === $value['path']) {echo 'style = "text-decoration:underline"';}?>><?=$value['title']?></a></li><?php
    }
}

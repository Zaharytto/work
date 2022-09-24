<?php

function showMenu($array)
{
    foreach ($array as $value) {
        ?><li> <a href =<?=$value['path']?>><?=$value['title']?></a></li><?php
    }
}

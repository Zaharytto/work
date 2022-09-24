<?php

function headerOutput ($array, $url, $component = PHP_URL_PATH)
{
    foreach ($array as $value) {
        if ($value['path'] === parse_url($url, $component)) {
            return $value['title'];
        }
    }
}
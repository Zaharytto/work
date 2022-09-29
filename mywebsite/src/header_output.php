<?php

function headerOutput (array $array, $url, string$component = PHP_URL_PATH): string
{
    foreach ($array as $value) {
        if ($value['path'] === parse_url($url, $component)) {
            return $value['title'];
        }
    }
}
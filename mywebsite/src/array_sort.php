<?php

function arraySort (array $array, $key = 'sort', $sort = SORT_ASC): array
{
    $arrayBefore = [];
    foreach ($array as $i => $value) {

        $arrayBefore[$i] = $value[$key];
    }

     array_multisort($arrayBefore, $sort, $array);
     return $array; 
}

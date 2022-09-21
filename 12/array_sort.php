<?php




function arraySort (array $array, $key = 'sort', $sort = SORT_ASC): array
{
    $price = array();
    foreach ($array as $i => $row) {

        $price[$i] = $row[$key];
    }

     array_multisort($price, $sort, $array);
     return $array;

    
}




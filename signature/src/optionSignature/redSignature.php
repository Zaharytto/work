<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/signature/src/interface/interfaceSignature.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/signature/src/optionNumber/officeNumberInMinsk.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/signature/src/optionNumber/officeNumberInWarsaw.php';

class RedSignature implements InterfaceSignature
{
    public function subscribe(string $name, string $message)
    {
        $numM = (new OfficeNumberInMinsk)->getNumber();
        $numW = (new OfficeNumberInWarsaw)->getNumber();
        
        $signature = '<meta charset="UTF-8" />' .
        '<p style="color: red">' . '<br>' .
            '-' . '<br>' .
            'С уважением' . '<br>' .
            $name . '<br>' .
            'Тел.' . '<br>' .
            '<a href=' . "tel:$numM" . '>' .
            $numM . '</a>' . '<br>' .
            '<a href=' . "tel:$numW" . '>' .
            $numW . '</a>' . '<br>' .
            'Email' . '<br>' .
            '<a href="https://e.mail.ru/compose?To=demo%40bx-shef.by">' .
            'demo@bx-shef.by' .'</a>' . '<br>' .
            '<a href="https://e.mail.ru/compose?To=demo2%40bx-shef.by">' .
            'demo2@bx-shef.by' .'</a>' .
        '</p>';

        $fp = fopen('../downloads/' . time() . 'redSignature.html', 'w');
        fwrite($fp, $message . $signature);
        fclose($fp);
    }
}

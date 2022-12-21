<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/signature/src/interface/InterfaceCreateSignature.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/signature/src/optionSignature/GreenSignature.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/signature/src/optionSignature/RedSignature.php';


class CreateSignature implements InterfaceCreateSignature
{
    private const RED_SIGNATURE = 'red';
    private const GREEN_SIGNATURE = 'green';

    public function getSignature(string $signature): InterfaceSignature
    {
        if ($signature === static::RED_SIGNATURE) {
            return new RedSignature();            
        } 
        if ($signature === static::GREEN_SIGNATURE) {
            return new GreenSignature();            
        }

        throw new Exception('Сервис временно не работает =(');
    }
}

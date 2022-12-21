<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/signature/src/interface/interfaceNumber.php';


class OfficeNumberInMinsk implements InterfaceNumber
{
    public function getNumber(): string
    {
        return '+375-(44)-333-00-01';
    }
}

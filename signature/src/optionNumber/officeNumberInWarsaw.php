<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/signature/src/interface/InterfaceNumber.php';


class OfficeNumberInWarsaw implements InterfaceNumber
{
    public function getNumber(): string
    {
        return '+48 516-671-635';
    }
}

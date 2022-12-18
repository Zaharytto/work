<?php

interface FactoryMethod
{
    public function getWritingObject(string $product): WritingObject;
}

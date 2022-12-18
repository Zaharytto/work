<?php

class CreateWritingObject implements FactoryMethod
{
    const PEN = 'Ручка';
    const PENCIL = 'Карандаш';

    public function getWritingObject($product): WritingObject
    {
        if ($product === static::PEN) {
            return new Pen();            
        } else if ($product === static::PENCIL) {
            return new Pencil();            
        } else {
            throw new Exception('Умеем писать только ручкой или карандашом');
        }
    }
}
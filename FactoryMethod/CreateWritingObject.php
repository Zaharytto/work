<?php

class CreateWritingObject implements FactoryMethod
{
    private const PEN = 'Ручка';
    private const PENCIL = 'Карандаш';

    public function getWritingObject(string $product): WritingObject
    {
        if ($product === static::PEN) {
            return new Pen();            
        } elseif ($product === static::PENCIL) {
            return new Pencil();            
        }

        throw new Exception('Умеем писать только ручкой или карандашом');
    }
}

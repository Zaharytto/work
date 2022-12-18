<?php

require_once 'WritingObjectInterface.php';
require_once 'FactoryMethod.php';
require_once 'Pen.php';
require_once 'Pencil.php';
require_once 'CreateWritingObject.php';

try {
    $factory = new CreateWritingObject();
    $pen = $factory->getWritingObject('Ручка');
    $pen->write();
} catch (Exception $exception) {
    echo $exception->getMessage();   
}

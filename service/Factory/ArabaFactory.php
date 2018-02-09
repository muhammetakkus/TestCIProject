<?php namespace Service\Factory;

use Service\Factory\Controller\Araba;

class ArabaFactory
{
    public static function create($make, $model)
    {
        return new Araba($make, $model);
    }
}
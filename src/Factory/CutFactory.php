<?php namespace App\Factory;

abstract class CutFactory
{
    public function cutting(string $kurban)
    {
        return (new $kurban());
    }
}
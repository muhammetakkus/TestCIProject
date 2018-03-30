<?php namespace App\Factory;

/* aynı abstract sınıf veya interface'den türeyen nesnelerin üretiminden sorumlu yapı */

abstract class CutFactory
{
    public function cutting(string $kurban)
    {
        return (new $kurban());
    }
}
<?php use App\Interf\CutterInterface;

class Deve implements CutterInterface
{
    public function cut(): string
    {
        return 'Deve kesildi..';
    }
}
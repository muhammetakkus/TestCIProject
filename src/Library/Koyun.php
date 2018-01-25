<?php use App\Interf\CutterInterface;

class Koyun implements CutterInterface
{
    public function cut(): string
    {
        return 'Koyun kesildi..';
    }
}
?>
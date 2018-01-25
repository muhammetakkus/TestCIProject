<?php use App\Interf\CutterInterface;

class At implements CutterInterface
{
    public function cut(): string
    {
        return 'At kesildi..';
    }
}

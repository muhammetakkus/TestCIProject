<?php namespace App;
//event test
use App\Factory\CutFactory;

class Event extends CutFactory
{
    /**
     * @param string $kurban
     */
    public function index(string $kurban)
    {
        return parent::cutting($kurban);
    }
}

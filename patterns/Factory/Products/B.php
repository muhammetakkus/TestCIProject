<?php namespace Pattern\Factory\Products;

use Pattern\Factory\ProductInterface;

class B implements ProductInterface
{
    public function displayInfo()
    {
        return 'B Info';
    }
}
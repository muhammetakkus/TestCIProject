<?php namespace Pattern\Factory\Products;

use Pattern\Factory\ProductInterface;

class A implements ProductInterface
{
    public function displayInfo()
    {
        return 'selam A';
    }
}
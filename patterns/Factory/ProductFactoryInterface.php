<?php namespace Pattern\Factory;

interface ProductFactoryInterface
{
    public function factory(ProductInterface $productType);
}
<?php namespace Pattern\Strategy;

// bu arada interface methodları overwrite edilmek zorunda olduğu için public olmak zorunda
// + iki interface birbirini extends alabilir
interface PaymentInterface
{
    public function payment();
}
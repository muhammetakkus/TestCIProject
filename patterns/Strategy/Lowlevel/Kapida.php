<?php namespace Pattern\Strategy\Lowlevel;

use Pattern\Strategy\PaymentInterface;

class Kapida implements PaymentInterface
{
    public function payment()
    {
        /* kapıda ödeme işlemleri */

        return 'Kapıda Ödeme Taahhüdü Alındı';
    }
}
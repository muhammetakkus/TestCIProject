<?php namespace Pattern\Strategy\Lowlevel;

use Pattern\Strategy\PaymentInterface;

class KrediKart implements PaymentInterface
{
    public function payment()
    {
        /* kredi kartı ile ödeme işlemleri */

        return 'Kredi Kartı ile Ödeme Yapıldı';
    }
}
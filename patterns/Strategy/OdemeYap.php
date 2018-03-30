<?php namespace Pattern\Strategy;

/* Asıl mesele Interface'i implemente eden classların buradan kontrol edilebilmesi - bu class'a context deniyor yani controlun üzerinden sağlandığı sınıf*/
/* bir başka ödeme yöntemi için Lowlevel içinde yöntemi oluşturup sadece ödeme yönteminin kodlarını yazmak */
/* bütün ödeme yöntemleri için ödeme yönteminden bağımsız methodları burada barındırabiliriz */

// StrategyContex sınıfı
class OdemeYap
{
    private $pay;

    /* Parametre olarak PaymentInterface'i implemente eden sınıflar kabul ediliyor */
    public function __construct(PaymentInterface $pay)
    {
        /* 2. bir kullanım */
        /* şimdi bu kullanımda görüldüğü gibi Lowlevel classlar tanıplanıp gönderilmesi gerekiyor */
        /* eğer sadece ödeme metodunu alsaydık burada Lowlevel classlar için switch yapısı oluşturacaktık */
        
        /* 3. bir kullanım - yine lowlevel class ismi alıp burada bu şekilde switch olmadan tanımlayabiliriz */
        // $nesne = 'Pattern\Strategy\Lowlevel\\' . $pay;
        // $this->pay = new $nesne;
        // burada sıkıntı şu ki gelen değer class ismi değil bir key olacak ve switch yapısı kurmak zorunda kalacğız
        // şu da var kullanıcıdan alınan belirsiz değer değilse biz burada olduğu gibi tanımlayarak göndeririz

        $this->pay = $pay;
    }

    public function ode()
    {
        return $this->pay->payment();
    }
}
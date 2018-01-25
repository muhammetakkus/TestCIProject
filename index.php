<?php
include './src/autoload.php';

$event = new App\Event();

$deve = $event->index('Deve');
$koyun = $event->index('Koyun');
$at = $event->index('At');

echo $deve->cut();
echo $koyun->cut();
echo $at->cut();

$tester = new Tester(new App\Database\Connection);
$row = $tester->list();
var_dump($row);

/* Her hayvan tipi kendisinde mutlak olarak bulunması gereken metodları CutterInterface'den
 * implemente ediyor
 * CutFactory'nin görevi kendisine gelen parametreleri tanımlayıp instance'ı return etmek
 * Event.php -> CutFactory'i kullanan sınıf - Yani bizim control mekanizmasında CutterInterface ve
 * CutFactory ile hiç bir işimiz yok
 */

/* 
 * Bu şekilde yeni kesilecek bir kurban olursa sadece onun için bir sayfa oluşturmak ve 
 * -var olan ana componenti kullanarak (Event-Factory)- istenen yerde
 * kesmek kalıyor. Yani o var olan ana componentte değişiklik yapmadan sistem genişleyebiliyor.
 */

/*
 * use App\Event; şimdi burada Event App kapsamı altında old. için Onun altındakiler de App kapsamında olmalı
 * Çünkü artık App\Event altında tanımlanan her şey yine o kapsamda aranıyor.
 * dolayısıyla Event altında kullanılan CutFactory'de App kapsamına aldık
 */


 
# SOLID - Liskov Subtitution #

 /* Burada olay şu high level classlar daha low classlara bağımlı olmamalı Liskov Subtitution Principle */
 /* ama high level class soyut bir şeye bağımlı olabilir sıkıntı yok o yüzden
    MySQLConnection içerisindeki methodu kullanacak high elemanı interface'e bağladık aşağıdaki gibi yaptık */

# kısım 1 #
interface DBConnectionInterface {
    public function connect();
}    

# kısım 2 #
class MySQLConnection implements DBConnectionInterface {
    public function connect() {
        return "Database connection";
    }
}

class Selamlar implements DBConnectionInterface {
    public function connect() {
        return "selamlar Database connection";
    }
}

# kısım 3 #
class PasswordReminder {
    private $dbConnection;

    public function __construct(DBConnectionInterface $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function test()
    {
        return $this->dbConnection->connect();
    }
}  

/* high level class'ı kullanırken de implemente edilmiş low level classlardan hangisi içersindeki methodu
   kullanmak istersek onu gönderiyoruz, high level zaten içeride interface'e bağımlı */
echo (new PasswordReminder(new MySQLConnection))->test();

?>
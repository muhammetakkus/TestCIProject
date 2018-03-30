<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);


include 'vendor/autoload.php';

/* Open Closed Principle Client */
$item = new \Solid\OpenClosed\Item\Daire();
$run = new \Solid\OpenClosed\Run($item);
echo $run->run();
/**/

/* IoC - Inversion of Control */
$item = new \Solid\IoC\Item\Ucgen();
$run = new \Solid\IoC\Run($item);
echo $run->run();
/**/

/* BU HANGİ PATTERN'i İFADE EDİYOR */
$event = new App\Event();
/*
$deve = $event->index('Deve');
$koyun = $event->index('Koyun');
$at = $event->index('At');
echo $deve->cut();
echo $koyun->cut();
echo $at->cut();
*/

/*************************************/

/*
$tester = new Tester(new App\Database\Connection);
$row = $tester->list();
var_dump($row);
*/

/******Bu patternler öğrenme amaçlı yazıldığı için logic yanlışlar olabilir******/ echo PHP_EOL;

# Strategy Pattern - aynı datanın iş çeşitlerinin olacağı/artacağı durumda tercih edilir #
/* bir loglama sistemi bunun üzerinde kurulabilir çünkü aynı olan log datası Redis'e almak istenebilir Database'e almak istenebilir Dosya'ya almak istenebilir etc */
/* strategy behavior pattern olduğu işin fiile dayalı işlerde kullanılıyor run, fly, do */
/* Strategy Design Pattern Controller */ 
$odemeSekli = new \Pattern\Strategy\Lowlevel\KrediKart();
// $kapida = new \Pattern\Strategy\Lowlevel\Kapida();
echo (new \Pattern\Strategy\OdemeYap($odemeSekli))->ode();

/*************************************/ echo PHP_EOL;
# StrategySecondExample #

/* Yapılan şey: Datanın gönderildiği nesne forma gönderiliyor.
 * Formda o datanın gönderildiği nesne üzerindeki methodları kullanıp istediği formda değer döndürebilir 
 */

 /**
 * Burada fayda şudur: Bir işin(Kitap Başlığı Gösterme)
 * Hangi özelliğini hangi formda istiyorum  -  burada özellik ve form extensible
 */

/* alttaki kodlar modülün kullanımıdır ve controllerda olmalıdır. */
$book = new \Pattern\StrategySecondExample\Book('aşk-ı memnu', 'halit ziya');
 
/* Form Belirle */
$strategyContextBuyukHarf = new \Pattern\StrategySecondExample\StrategyContext('büyük');
$strategyContextKucukHarf = new \Pattern\StrategySecondExample\StrategyContext('küçük');
$strategyContextBasHarfiBuyuk = new \Pattern\StrategySecondExample\StrategyContext('ideal');

/* Özellik Seç */
echo $strategyContextBasHarfiBuyuk->showBookTitle($book);

/* Eğer BirKucukBirBuyukHarf formunda da data görmek istersem Contexe o özelliği tanımlarım ve Forms altında bir class oluşturup bu yeni formu belirlerim */
/* aklıma takılan: Book class'ı içinde 3 özellik var Contexteki showBookTitle methodu
   formların üzerinden sadece Book classının bir methodunu kullanıyor? Başka örneklerden anladığım kadarıyla
   StrategyPattern esasında bir tür data almalı yani buradaki gibi title ve author değil böyle olsa bile
   Bookta sadece getTitleAndOuthor kullanılmalı çünkü StrategyInterface hep bir method barındırıyor
   ve bir iş demektir bu. Yani StrategyInterface'i implemente eden bir form bir title bir author üzerinden
   iş yapmayacak bu sebeple Book 2. parametreyi ya almamalı ya da bir konuya toplamalı sonuç olarak bir mesele olmalı
   şuradaki Strategy örneği demek istediğimş daha iyi anlatıyor
   http://www.phptherightway.com/pages/Design-Patterns.html */

/*************************************/ echo PHP_EOL;
# FACTORY #
/* Bir yazılım şirketinin belli sahalarda ürünleri var. İleride başka bir sahada bir ürün çıkartılabilir */

/*  burada fayda; hep factory tanımlayıp üzerinden istediğimiz classları tanımlıyoruz  */
/* factroy belli bir tip/key ile bir sınıfı factory metoda ürettirmemizi sağlar */
$productFactory = new \Pattern\Factory\ProductFactory();

/* controllerda istenen class ve method */
$b = $productFactory->factory('B');
$bInfo = $b->displayInfo();
echo $bInfo;

/***************Şu Yapı Önemli**********************/ echo PHP_EOL;
class Automobile
{
    private $vehicleMake;
    private $vehicleModel;

    public function __construct($make, $model)
    {
        $this->vehicleMake = $make;
        $this->vehicleModel = $model;
    }

    public function getMakeAndModel()
    {
        return $this->vehicleMake . ' ' . $this->vehicleModel;
    }
}

class AutomobileFactory
{
    public function create($make, $model)
    {
        return new Automobile($make, $model);
    }
}

// have the factory create the Automobile object
$veyron = (new AutomobileFactory())->create('Bugatti', 'Veyron');

print_r($veyron->getMakeAndModel()); // outputs "Bugatti Veyron"
/*************************************/ echo PHP_EOL;

/*************************************/ echo PHP_EOL;


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


echo PHP_EOL;
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
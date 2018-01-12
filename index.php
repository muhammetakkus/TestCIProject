<?php
require 'src/CutFactory.php';
require 'src/CutterInterface.php';
require 'src/Deve.php';
require 'src/Koyun.php';
require 'src/At.php';
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

/* Bu şekilde yeni kesilecek bir kurban olursa sadece onun için bir sayfa oluşturmak ve ilgili yerde onu 
   var olan ana componenti kullanarak kesmek kalıyor. Yani o var olan ana componentte değişiklik yapmadan
   sistem genişleyebiliyor. */
$event = new Event();
$deve = $event->index('Deve');
$koyun = $event->index('Koyun');
$at = $event->index('At');
echo $deve->cut();
echo $koyun->cut();
echo $at->cut();

if (extension_loaded('mbstring')) { echo 'var'; } else { echo 'yok'; }
?>
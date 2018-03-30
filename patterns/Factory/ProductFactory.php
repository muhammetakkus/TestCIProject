<?php namespace Pattern\Factory;

use Pattern\Factory\ProductFactoryInterface;

/* Farklı çeşit altında üretilecek ürünlerin classları olsaydı
 ProductFactory gibi bir class daha ProducFactoryInterface'ini implemente eder 
 ve ona 2. kısım ürünlerin üretim görevini verirdik. Bu da abstract factory */
class ProductFactory implements ProductFactoryInterface
{
    public function factory($productType)
    {
        // bu şekil factory'e uygun değil sanırım çünkü alt classların(A,B) ismini
        // değiştirmek istediğimizde bunu sadece o classsın isminin ve buradaki new ile çağrırken kullandığımız ismini değiştirmenin yetmesi lazım
        // zaten çağıracağımız kodu controllerda kullanmalıyız o kod bizim ismini cisminin değiştirebileceğimiz class olmalı
        /* $class = '\Pattern\Factory\Products\\' . $productType;
        return new $class(); */
        
        switch ($productType) {
            case 'A': 
                return new \Pattern\Factory\Products\A();
            break;
            case 'B': 
                return new \Pattern\Factory\Products\B();
            break;
        }
    }
}
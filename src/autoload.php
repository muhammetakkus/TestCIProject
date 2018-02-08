<?php
/**
 * bulunduğumuz dizin üzerinden konuşacak olursak
 * __DIR__ bulunduğu dizini verir  ..../src
 * dirname(__DIR__) working directory olarak root dizini verir bkz: ...../OpenClosedPrincipleExample
 * getcwd() ==? dirname(__DIR__)
 * dirname(__FILE__) dosyanın kök dizinini verir - bu da sanki __DIR__ ile aynı hesaba geliyor? bkz: ...../src
 * $_SERVER['DOCUMENT_ROOT'] server directory olarak root dizini verir bkz: ..../nginx
 */
spl_autoload_register(
    function ($class)
    {
        // include dirname(__DIR__) . '/src/' . str_replace('App\\', '/', $class) . '.php';
        
        $namespaces = [
            'App\\Event' => 'Event',
            'App\\Factory\\CutFactory' => 'Factory/CutFactory',
            'App\\Interf\\CutterInterface' => 'Interface/CutterInterface',
            'App\\Database\\Connection' => 'Database/Connection'
        ];
        
        $file = 'Library/' . $class;

        if(array_key_exists($class, $namespaces))
        {
            $file = $namespaces[$class];
        }
       
        include dirname(__DIR__) . '/src/' . $file . '.php';
    }
);

/**
 * SPL, kullanılan namespace'i şöyle çağırıyor; bkz: use Database\Connection;
 * namespace\$class
 * bizim namespace\ kısmını / ile replace etmemiz gerekir (str_replace olan ilk örnekteki gibi)
 */

 /**
  * Autoload kullanımı şu şekide psr-4 e uygun olur;
  * App -> src olsun
  * Her file'ın namespace'i kendi dosya yolu olsun örneğin;
  * ./src/Test/Core/index.php -> namespace App/Test/Core;
  */
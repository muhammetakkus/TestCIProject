<?php namespace App\Database;

class Connection
{
    public function connect()
    {
        try {
            $db = new \PDO('pgsql:host=localhost;port=5432;dbname=tester;user=postgres;password=test_pass');
        }catch(PDOException $e) {
            echo $e->getMessage().PHP_EOL;
        }
        return $db;
    }
}
//db test

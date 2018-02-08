<?php // namespace App\Library;

use App\Database\Connection;

class Tester
{
    public $repo;
    /**
     * @param string $repo database işlemleri kullanacak methodlar olacağı için
     */
    public function __construct(Connection $repo)
    {
        $this->repo = $repo;
    }

    public function list()
    {
        $stmt = $this->repo->connect()->query('SELECT * FROM xyz');
        return $stmt->fetch();
    }
}
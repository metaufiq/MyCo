<?php

namespace Index\Modules\MyCo\Infrastructure\Persistence;

use Index\Modules\MyCo\Domain\Model\Manajer;
use Index\Modules\MyCo\Domain\Repository\ManajerRepository;
use Phalcon\Db\Adapter\Pdo\Mysql;
use PDO;

class SqlManajerRepository implements ManajerRepository
{

    private $db;

    public function __construct(Mysql $db)
    {
        $this->db = $db;
    }


    public function create(Manajer $manajer)
    {
        $statement = sprintf("INSERT INTO Manajer(nama, email, `password`) VALUES(:nama,  :email, :p)");
        $params = ['nama' => $manajer->getNama(), 'email' => $manajer->getEmail(), 'p' => $manajer->getPassword()];
        $this->db->execute($statement, $params);

        return true;
    }

    // public function getAll();

    // public function delete(Manajer $manajer);

    // public function edit(Manajer $manajer);
}

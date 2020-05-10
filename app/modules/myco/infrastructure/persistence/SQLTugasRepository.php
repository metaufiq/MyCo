<?php
namespace Index\Modules\MyCo\Infrastructure\Persistence;

use Index\Modules\MyCo\Domain\Model\Tugas;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;
use Phalcon\Db\Adapter\Pdo\Mysql;
use PDO;

class SqlTugasRepository implements TugasRepository
{

    private $db;

    public function __construct(Mysql $db)
    {
        $this->db = $db;
    }
    public function save(Tugas $tugas){
        return "simpan tugas";
    }
    
    public function getAll(){
        $statement = sprintf("SELECT * FROM tugas");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(Tugas $tugas){
        return "delete tugas";
    }

    public function edit(Tugas $tugas){
        return "edit tugas";
    }

}
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
    public function save(Tugas $tugas)
    {
        // return [ 'tugas' => $tugas->getNama(), 'tenggat_waktu' => $tugas->getTenggatWaktu(), 'pegawai' => $tugas->getPegawai(), 'status' => $tugas->getStatus()];
        $statement = sprintf("INSERT INTO Tugas(tugas, tenggat_waktu, `status`) VALUES(:tugas,  :tenggatWaktu, :s)");
        $params = ['tugas' => $tugas->getNama(), 'tenggatWaktu' => $tugas->getTenggatWaktu(), 's' => $tugas->getStatus()];
        $this->db->execute($statement, $params);

        $tugasId = $this->db->lastInsertId();

        foreach ($tugas->getPegawai() as $pegawai) {
            $statement = sprintf("INSERT INTO Penugasan(tugas, pegawai) VALUES(:tugas,  :pegawai)");
            $params = ['tugas' => $tugasId, 'pegawai' => $pegawai];
            $this->db->execute($statement, $params);
        }
        return true;
    }

    public function getAll()
    {
        $statement = sprintf("SELECT p.nama as nama_pegawai,p.id as id_pegawai,t.tugas as nama_tugas, t.id as id_tugas,t.tenggat_waktu,st.status as nama_status,st.id as id_status FROM penugasan pn 
        INNER JOIN tugas t ON pn.tugas = t.id 
        INNER JOIN pegawai p ON pn.pegawai = p.id
        INNER JOIN status_tugas st ON t.status = st.id");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(Tugas $tugas)
    {
        $statement = sprintf("DELETE FROM Tugas WHERE id= :id");
        $params = ['id' => $tugas->getId(),];
        $this->db->execute($statement, $params);

        $statement = sprintf("DELETE FROM Penugasan WHERE tugas= :tugas");
        $params = ['tugas' => $tugas->getId()];
        $this->db->execute($statement, $params);

        return true;
    }

    public function edit(Tugas $tugas)
    {
        return "edit tugas";
    }
}

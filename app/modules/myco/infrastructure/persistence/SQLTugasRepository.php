<?php

namespace Index\Modules\MyCo\Infrastructure\Persistence;

use Index\Modules\MyCo\Domain\Model\Tugas;
use Index\Modules\MyCo\Domain\Model\TugasId;
use Index\Modules\MyCo\Domain\Model\TugasStatus;
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
    public function create(Tugas $tugas)
    {
        // return [ 'tugas' => $tugas->getNama(), 'tenggat_waktu' => $tugas->getTenggatWaktu(), 'pegawai' => $tugas->getPegawai(), 'status' => $tugas->getStatus()];
        $statement = sprintf("INSERT INTO Tugas(tugas, tenggat_waktu, `status`) VALUES(:tugas,  :tenggatWaktu, :s)");
        $params = ['tugas' => $tugas->getNama(), 'tenggatWaktu' => $tugas->getTenggatWaktu(), 's' => $tugas->getStatus()];
        $this->db->execute($statement, $params);


    }

    public function getAll()
    {
        $statement = sprintf("SELECT t.id, t.tugas, t.tenggat_waktu, st.id as status_id, st.status FROM Tugas t INNER JOIN status_tugas st ON st.id = t.status");

        $allTugas = $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);

        $result = array();
        foreach ($allTugas as $tugas) {
            $tugasId = new TugasId($tugas['id']);
            $status = new TugasStatus($tugas['status_id'], $tugas['status']);
            $newTugas = new Tugas($tugasId, $tugas['tugas'], $tugas['tenggat_waktu'], $status);
            array_push($result, $newTugas);
        }

        return $result;
    }

    function getLatestInsertedId() : TugasId
    {
        $tugasId = $this->db->lastInsertId();
        
        $result = new TugasId($tugasId);

        return $result;
    }

    public function getById(Tugas $tugas)
    {
        $statement = sprintf("SELECT t.id, t.tugas, t.tenggat_waktu, st.status FROM Tugas t INNER JOIN status_tugas st ON st.id = t.status WHERE id= :id");
        $params = ['id' => $tugas->getId()];

        $tugasFromQuery = $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);

        $statement = sprintf("SELECT pegawai FROM Penugasan WHERE tugas=:tugas");
        $params = ['tugas' => $tugas->getId()];
        $pegawaiFromDB = $this->db->query($statement, $params)
            ->fetchAll(PDO::FETCH_ASSOC);

        $temp = array();
        foreach ($pegawaiFromDB as $pegawai) {
            array_push($temp, $pegawai['pegawai']);
        }


        return new Tugas(
            $tugasFromQuery[0]['id'],
            $tugasFromQuery[0]['nama'],
            null,
            null,
            $tugasFromQuery[0]['status']
        );
    }

    public function delete(Tugas $tugas)
    {
        $statement = sprintf("DELETE FROM Tugas WHERE id= :id");
        $params = ['id' => $tugas->getId()->getId(),];
        $this->db->execute($statement, $params);

        $statement = sprintf("DELETE FROM Penugasan WHERE tugas= :tugas");
        $params = ['tugas' => $tugas->getId()->getId()];
        $this->db->execute($statement, $params);

        return true;
    }

    public function edit(Tugas $tugas)
    {
        $statement = sprintf("UPDATE Tugas SET  tugas=:tugas, tenggat_waktu=:tenggatWaktu, `status`= :s WHERE id= :id");
        $params = [
            'tugas' => $tugas->getNama(),
            'tenggatWaktu' => $tugas->getTenggatWaktu(), 
            's' => $tugas->getStatus(), 
            'id' => $tugas->getId()->getId()
        ];
        $this->db->execute($statement, $params);


        return true;
    }


    public function setTelat(Tugas $tugas)
    {
        $statement = sprintf("UPDATE Tugas SET  `status`=0 WHERE id= :id");
        $params = ['id' => $tugas->getId()->getId()];
        $this->db->execute($statement, $params);
    }
}

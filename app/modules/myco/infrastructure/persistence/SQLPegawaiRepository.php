<?php

namespace Index\Modules\MyCo\Infrastructure\Persistence;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;
use Phalcon\Db\Adapter\Pdo\Mysql;
use PDO;

class SqlPegawaiRepository implements PegawaiRepository
{

    private $db;

    public function __construct(Mysql $db)
    {
        $this->db = $db;
    }
    public function save(Pegawai $pegawai)
    {
        // return [ 'tugas' => $tugas->getNama(), 'tenggat_waktu' => $tugas->getTenggatWaktu(), 'pegawai' => $tugas->getPegawai(), 'status' => $tugas->getStatus()];
        $statement = sprintf("INSERT INTO Pegawai(nama, alamat, no_hp, t_pegawai_id) VALUES(:nama,  :alamat, :no_ho, :t_pegawai)");
        $params = ['nama' => $pegawai->getNama(), 'alamat' => $pegawai->getAlamat(), 'no_hp' => $pegawai->getNoHp(), 't_pegawai' => $pegawai->getTingkatPegawai()->getId()];
        $this->db->execute($statement, $params);
        return true;
    }

    public function getAll()
    {
        $statement = sprintf("SELECT p.nama as nama,p.alamat as alamat, p.no_hp as no_hp, tp.id as tingkat_pegawai_id FROM pegawai p 
        INNER JOIN tingkat_pegawai tp ON p.t_pegawai_id = tp.id");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(Pegawai $pegawai)
    {
        $statement = sprintf("DELETE FROM Pegawai WHERE id= :id");
        $params = ['id' => $pegawai->getId(),];
        $this->db->execute($statement, $params);

        return true;
    }

    public function edit(Pegawai $pegawai)
    {
        $statement = sprintf("UPDATE Pegawai SET  nama=:nama, alamat=:alamat, no_hp=:no_hp, t_pegawai_id=:tp_id WHERE id= :id");
        $params = ['nama' => $pegawai->getNama(), 'alamat' => $pegawai->getAlamat(), 'no_hp' => $pegawai->getNoHp(), 'tp_id' => $pegawai->getTingkatPegawai()->getId()];
        $this->db->execute($statement, $params);

        return true;
    }
}
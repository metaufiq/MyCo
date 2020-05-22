<?php

namespace Index\Modules\MyCo\Infrastructure\Persistence;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\TugasId;
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
        $statement = sprintf("SELECT p.id,p.nama as nama,p.alamat as alamat, p.no_hp as no_hp, tp.tingkat_nama as tingkat_nama FROM pegawai p 
        INNER JOIN tingkat_pegawai tp ON p.t_pegawai_id = tp.id");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByTugasId(TugasId $tugasId)
    {
        $statement = sprintf("SELECT p.nama, p.alamat, p.no_hp, t_pegawai_id FROM Penugasan pgsn 
        INNER JOIN Pegawai p ON pgsn.pegawai = p.id WHERE pgsn.tugas= :tugas ");
        $params = ['tugas'=> $tugasId->getId()];
        
        return $this->db->query($statement, $params)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(Pegawai $pegawai)
    {
        $statement = sprintf("DELETE FROM Pegawai WHERE id= :id");
        $params = ['id' => $pegawai->getId()];
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

    public function getGajiPegawai() 
    {
        $statement = sprintf("SELECT g.bulan as bulan, g.upah_laukpauk as upah_laukpauk, g.upah_renumerasi as upah_renum,
        g.upah_kehadiran as upah_hadir, p.nama as nama, tp.tingkat_gaji as gaji_dasar FROM gaji g 
        INNER JOIN pegawai p ON g.pegawai_id = p.id
        INNER JOIN tingkat_pegawai tp ON tp.id = p.t_pegawai_id");
        return $this->db->query($statement)
        ->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAbsensiPegawai() 
    {
        $statement = sprintf("SELECT a.tanggal as tanggal, a.mulai_kerja as masuk, a.selesai_kerja as selesai, p.nama as nama, p.id as pegawai_id FROM absensi a INNER JOIN pegawai p ON a.pegawai_id = p.id");
        return $this->db->query($statement)
        ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editAbsensi(Pegawai $pegawai) 
    {

    }
}

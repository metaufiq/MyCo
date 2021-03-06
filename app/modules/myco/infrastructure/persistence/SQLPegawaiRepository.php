<?php

namespace Index\Modules\MyCo\Infrastructure\Persistence;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\Absensi;
use Index\Modules\MyCo\Domain\Model\Gaji;
use Index\Modules\MyCo\Domain\Model\PegawaiId;
use Index\Modules\MyCo\Domain\Model\TugasId;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;
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
    public function create(Pegawai $pegawai)
    {
        // return [ 'tugas' => $tugas->getNama(), 'tenggat_waktu' => $tugas->getTenggatWaktu(), 'pegawai' => $tugas->getPegawai(), 'status' => $tugas->getStatus()];
        $statement = sprintf("INSERT INTO Pegawai(nama, alamat, no_hp, t_pegawai_id) VALUES(:nama,  :alamat, :no_hp, :t_pegawai)");
        $params = ['nama' => $pegawai->getNama(), 'alamat' => $pegawai->getAlamat(), 'no_hp' => $pegawai->getNoHp(), 't_pegawai' => $pegawai->getTingkatPegawai()->getId()];
        $this->db->execute($statement, $params);
        return true;
    }

    public function createTugasPegawai(Pegawai $pegawai, TugasId $tugasId)
    {
        $statement = sprintf("INSERT INTO Penugasan(tugas, pegawai) VALUES(:tugas,  :pegawai)");
        $params = ['tugas' => $tugasId->getId(), 'pegawai' => $pegawai->getId()];
        $this->db->execute($statement, $params);
        return true;   
    }



    public function getAll()
    {
        $statement = sprintf("SELECT p.id,p.nama as nama,p.alamat as alamat, p.no_hp as no_hp, p.t_pegawai_id as tingkat_id FROM pegawai p");

        $allPegawai = $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
        
        $result = array();
        foreach($allPegawai as $pegawai) {
            $pegawaiId = new PegawaiId($pegawai['id']);
            $tingkatPegawai = new TingkatPegawaiId($pegawai['tingkat_id']);
            $newPegawai = new Pegawai($pegawaiId, $pegawai['nama'], $pegawai['alamat'], $pegawai['no_hp'], null, null, $tingkatPegawai);
            array_push($result, $newPegawai);
        }

        return $result;
    }

    public function getById(PegawaiId $pegawaiId)
    {
        $statement = sprintf("SELECT * FROM pegawai WHERE id= :id");
        $params = ['id' => $pegawaiId->getId()];

        $pegawai = $this->db->query($statement, $params)
            ->fetch(PDO::FETCH_ASSOC);
        
        $pegawaiId = new PegawaiId($pegawai['id']);
        $tingkatId = new TingkatPegawaiId($pegawai['t_pegawai_id']);
        $newPegawai = new Pegawai($pegawaiId, $pegawai['nama'], $pegawai['alamat'], $pegawai['no_hp'], null, null, $tingkatId);
        return $newPegawai;

    }

    public function getByTingkatId(TingkatPegawaiId $tingkatId)
    {
        $statement = sprintf("SELECT * FROM pegawai WHERE t_pegawai_id= :id");
        $params = ['id' => $tingkatId->getId()];

        $allPegawai = $this->db->query($statement, $params)
            ->fetchAll(PDO::FETCH_ASSOC);
        
        $result = array();
        foreach($allPegawai as $pegawai) {
            $pegawaiId = new PegawaiId($pegawai['id']);
            $newPegawai = new Pegawai($pegawaiId, $pegawai['nama'], $pegawai['alamat'], $pegawai['no_hp'], null, null, $tingkatId);
            array_push($result, $newPegawai);
        }
        return $result;
    }

    public function getAbsensiById(PegawaiId $pegawaiId)
    {
        $statement = sprintf("SELECT p.id as id, p.t_pegawai_id as tingkat_id, a.tanggal as tanggal, a.mulai_kerja as mulai, a.selesai_kerja as selesai FROM pegawai p INNER JOIN absensi a ON p.id = a.pegawai_id WHERE p.id= :id");
        $params = ['id' => $pegawaiId->getId()];

        $pegawai = $this->db->query($statement, $params)
            ->fetch(PDO::FETCH_ASSOC);
        
        $pegawaiId = new PegawaiId($pegawai['id']);
        $tingkatId = new TingkatPegawaiId($pegawai['t_pegawai_id']);
        $absensi = new Absensi($pegawai['tanggal'], $pegawai['mulai'], $pegawai['selesai']);
        $newPegawai = new Pegawai($pegawaiId, $pegawai['nama'], $pegawai['alamat'], $pegawai['no_hp'], $absensi, null, $tingkatId);
        return $newPegawai;

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
    public function deleteAllTugasPegawaiByTugasId(TugasId $tugasId)
    {
        $statement = sprintf("DELETE FROM Penugasan WHERE tugas=:tugas");
        $params = ['tugas' => $tugasId->getId()];
        $this->db->execute($statement, $params);
        return true;   
    }
    public function edit(Pegawai $pegawai)
    {
        $statement = sprintf("UPDATE Pegawai SET  nama=:nama, alamat=:alamat, no_hp=:no_hp, t_pegawai_id=:tp_id WHERE id= :id");
        $params = ['nama' => $pegawai->getNama(), 'alamat' => $pegawai->getAlamat(), 'no_hp' => $pegawai->getNoHp(), 'tp_id' => $pegawai->getTingkatPegawaiId()->getId()];
        $this->db->execute($statement, $params);

        return true;
    }

    public function getGajiPegawai() 
    {
        $statement = sprintf("SELECT g.bulan as bulan, g.upah_laukpauk as upah_laukpauk, g.upah_renumerasi as upah_renum,
        g.upah_kehadiran as upah_hadir, g.pegawai_id as pegawai_id, p.t_pegawai_id as tingkat_id, p.nama as nama FROM gaji g INNER JOIN pegawai p ON g.pegawai_id = p.id");
        $allGaji =  $this->db->query($statement)
        ->fetchAll(PDO::FETCH_ASSOC);

        $result = array();
        foreach($allGaji as $gaji) {
            $pegawaiId = new PegawaiId($gaji['pegawai_id']);
            $tingkatPegawaiId = new TingkatPegawaiId($gaji['tingkat_id']);
            $absensi = new Absensi(null, null, null, null);
            $gajiPegawai = new Gaji($gaji['bulan'], $gaji['upah_laukpauk'], $gaji['upah_renum'], $gaji['upah_hadir']);
            $newPegawai = new Pegawai($pegawaiId, $gaji['nama'], null, null, $absensi, $gajiPegawai, $tingkatPegawaiId);
            array_push($result, $newPegawai);
        }

        return $result;
    }
    
    public function getAbsensiPegawai() 
    {
        $statement = sprintf("SELECT a.tanggal as tanggal, a.mulai_kerja as mulai, a.selesai_kerja as selesai, a.pegawai_id as pegawai_id, p.nama as nama, p.t_pegawai_id as tingkat_id FROM absensi a INNER JOIN pegawai p ON a.pegawai_id = p.id");
        $allAbsensi =  $this->db->query($statement)
        ->fetchAll(PDO::FETCH_ASSOC);

        $result = array();
        foreach($allAbsensi as $absensi) {
            $pegawaiId = new PegawaiId($absensi['pegawai_id']);
            $tingkatPegawaiId = new TingkatPegawaiId($absensi['tingkat_id']);
            $absensiPegawai = new Absensi($absensi['tanggal'], $absensi['mulai'], $absensi['selesai']);
            $newPegawai = new Pegawai($pegawaiId, $absensi['nama'], null, null, $absensiPegawai, null, $tingkatPegawaiId);
            array_push($result, $newPegawai);
        }

        return $result;
    }

    public function editAbsensi(Pegawai $pegawai) 
    {

    }
}

<?php

namespace Index\Modules\MyCo\Infrastructure\Persistence;

use Index\Modules\MyCo\Domain\Model\TingkatPegawai;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;
use Index\Modules\MyCo\Domain\Repository\TingkatPegawaiRepository;
use Phalcon\Db\Adapter\Pdo\Mysql;
use PDO;

class SqlTingkatPegawaiRepository implements TingkatPegawaiRepository
{
    private $db;

    public function __construct(Mysql $db)
    {
        $this->db = $db;
    }
    public function create(TingkatPegawai $tingkat)
    {
        $statement = sprintf("INSERT INTO tingkat_pegawai(tingkat_nama, tingkat_jenis, tingkat_golongan, tingkat_pendidikan, tingkat_lamakerja, tingkat_gaji) VALUES(:nama,  :jenis, :golongan, :pendidikan, :lamakerja, :gaji_dasar)");
        $params = ['nama' => $tingkat->getNama(), 'jenis' => $tingkat->getJenis(), 'golongan' => $tingkat->getGolongan(), 'pendidikan' => $tingkat->getPendidikan(), 'lamakerja' => $tingkat->getLamaKerja(), 'gaji_dasar' => $tingkat->getGajiDasar()];
        
        $this->db->execute($statement, $params);

        return true;
    }

    function getLatestInsertedId() : TingkatPegawaiId
    {
        $tingkatId = $this->db->lastInsertId();
        
        $result = new TingkatPegawaiId($tingkatId+1);

        return $result;
    }

    public function getAll()
    {
        $statement = sprintf("SELECT id, tingkat_nama, tingkat_jenis, tingkat_golongan, tingkat_pendidikan, tingkat_lamakerja, tingkat_gaji FROM tingkat_pegawai");

        $allTingkat = $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);

        $result = array();
        foreach($allTingkat as $tingkat) {
            $tingkatPegawaiId = new TingkatPegawaiId($tingkat['id']);
            $newTingkat = new TingkatPegawai($tingkatPegawaiId, $tingkat['tingkat_nama'], $tingkat['tingkat_jenis'], $tingkat['tingkat_golongan'], $tingkat['tingkat_pendidikan'], $tingkat['tingkat_lamakerja'], $tingkat['tingkat_gaji']);
            array_push($result, $newTingkat);
        }

        return $result;
    }

    public function getById(TingkatPegawaiId $tingkatId)
    {
        $statement = sprintf("SELECT * FROM tingkat_pegawai WHERE id= :id");
        $params = ['id' => $tingkatId->getId()];

        $tingkat = $this->db->query($statement, $params)
            ->fetch(PDO::FETCH_ASSOC);
        
        $newTingkat = new TingkatPegawai($tingkatId, $tingkat['tingkat_nama'], $tingkat['tingkat_jenis'], $tingkat['tingkat_golongan'], $tingkat['tingkat_pendidikan'], $tingkat['tingkat_lamakerja'], $tingkat['tingkat_gaji']);
        return $newTingkat;
    }

    public function delete(TingkatPegawaiId $id)
    {
        $statement = sprintf("DELETE FROM tingkat_pegawai WHERE id= :id");
        $params = ['id' => $id->getId()];
        $this->db->execute($statement, $params);

        return true;
    }

    public function edit(TingkatPegawai $tingkat)
    {   

        $statement = sprintf("UPDATE tingkat_pegawai SET tingkat_nama=:nama, tingkat_jenis=:jenis, tingkat_golongan=:golongan, tingkat_pendidikan=:pendidikan, tingkat_lamakerja=:lamakerja, tingkat_gaji=:gaji WHERE id=:id");
        $params = ['nama' => $tingkat->getNama(), 'jenis' => $tingkat->getJenis(), 'golongan' => $tingkat->getGolongan(), 'pendidikan' => $tingkat->getPendidikan(), 'lamakerja' => $tingkat->getLamaKerja(), 'gaji' => $tingkat->getGajiDasar(), 'id' => $tingkat->getId()];
        
        $this->db->execute($statement, $params);
        // return true;

        return true;
    }
}

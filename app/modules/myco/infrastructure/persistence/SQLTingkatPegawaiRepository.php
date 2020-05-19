<?php

namespace Index\Modules\MyCo\Infrastructure\Persistence;

use Index\Modules\MyCo\Domain\Model\TingkatPegawai;
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
    public function save(TingkatPegawai $tingkat)
    {
        $statement = sprintf("INSERT INTO tingkat_pegawai(tingkat_nama, tingkat_jenis, tingkat_golongan, tingkat_pendidikan, tingkat_lamakerja, tingkat_gaji) VALUES(:nama,  :jenis, :golongan, :pendidikan, :lamakerja, :gaji_dasar)");
        $params = ['nama' => $tingkat->getNama(), 'jenis' => $tingkat->getJenis(), 'golongan' => $tingkat->getGolongan(), 'pendidikan' => $tingkat->getPendidikan(), 'lamakerja' => $tingkat->getLamaKerja(), 'gaji_dasar' => $tingkat->getGajiDasar()];
        
        $this->db->execute($statement, $params);

        return true;
    }

    public function getAll()
    {
        $statement = sprintf("SELECT id, tingkat_nama, tingkat_jenis, tingkat_golongan, tingkat_pendidikan, tingkat_lamakerja, tingkat_gaji FROM tingkat_pegawai");

        return $this->db->query($statement)
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete(TingkatPegawai $tingkat)
    {
        $statement = sprintf("DELETE FROM tingkat_pegawai WHERE id= :id");
        $params = ['id' => $tingkat->getId()];
        $this->db->execute($statement, $params);

        return true;
    }

    public function edit(TingkatPegawai $tingkat)
    {   

        $statement = sprintf("UPDATE tingkat_pegawai SET tingkat_nama= :nama, tingkat_jenis= :jenis, tingkat_golongan= :golongan, tingkat_pendidikan= :pendidikan, tingkat_lamakerja= :lamakerja, tingkat_gaji= :gaji WHERE id= :id");
        $params = ['nama' => $tingkat->getNama(), 'jenis' => $tingkat->getJenis(), 'golongan' => $tingkat->getGolongan, 'pendidikan' => $tingkat->getPendidikan(), 'lamakerja' => $tingkat->getLamaKerja(), 'gaji' => $tingkat->getGajiDasar()];
        
        $this->db->execute($statement, $params);
        // return true;

        return true;
    }
}

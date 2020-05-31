<?php
namespace Index\Modules\MyCo\Domain\Model;

class TingkatPegawai
{
    private $id;
    private $nama;
    private $jenis;
    private $golongan;
    private $pendidikan;
    private $lamakerja;
    private $gaji_dasar;

    public function __construct(TingkatPegawaiId $id,$nama,$jenis,$golongan,$pendidikan,$lamakerja,$gaji_dasar)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->jenis = $jenis;
        $this->golongan = $golongan;
        $this->pendidikan = $pendidikan;
        $this->lamakerja = $lamakerja;
        $this->gaji_dasar = $gaji_dasar;
    }

    public function getId()
    {
        return $this->id->getId();
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getJenis(){
        return $this->jenis;
    }

    public function getGolongan()
    {
        return $this->golongan;
    }

    public function getPendidikan()
    {
        return $this->pendidikan;
    }

    public function getLamaKerja()
    {
        return $this->lamakerja;
    }

    public function getGajiDasar()
    {
        return number_format($this->gaji_dasar);
    }
}

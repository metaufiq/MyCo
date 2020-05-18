<?php


namespace Index\Modules\MyCo\Application\CreateTingkatPegawai;

class CreateTingkatPegawaiRequest
{
    private $nama;
    private $jenis;
    private $golongan;
    private $pendidikan;
    private $lamakerja;
    private $gaji_dasar;
    
    public function __construct($nama, $jenis, $golongan, $pendidikan, $lamakerja, $gaji_dasar)
    {
        $this->nama = $nama;
        $this->jenis = $jenis;
        $this->golongan = $golongan;
        $this->pendidikan = $pendidikan;
        $this->lamakerja = $lamakerja;
        $this->gaji_dasar = $gaji_dasar;
    }


    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getJenis()
    {
        return $this->jenis;
    }

    public function setJenis($jenis)
    {
        $this->jenis = $jenis;
    }

    public function getGolongan()
    {
        return $this->golongan;
    }

    public function setGolongan($golongan)
    {
        $this->golongan = $golongan;
    }

    public function getPendidikan()
    {
        return $this->pendidikan;
    }

    public function setPendidikan($pendidikan)
    {
        $this->pendidikan = $pendidikan;
    }
    
    public function getLamaKerja()
    {
        return $this->lamakerja;
    }

    public function setLamaKerja($lamakerja)
    {
        $this->lamakerja = $lamakerja;
    }
    
    public function getGajiDasar()
    {
        return $this->gaji_dasar;
    }

    public function setGajiDasar($gaji_dasar)
    {
        $this->gaji_dasar = $gaji_dasar;
    }
        
}

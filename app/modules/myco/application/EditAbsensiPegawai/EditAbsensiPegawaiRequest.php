<?php


namespace Index\Modules\MyCo\Application\EditAbsensiPegawai;


class EditAbsensiPegawaiRequest
{
    private $pegawai_id;
    private $absensi;

    public function __construct($pegawai_id, $absensi)
    {
        $this->pegawai_id = $pegawai_id;
        $this->absensi = $absensi;
    }
    public function getIdPegawai()
    {
        return $this->pegawai_id;
    }

    public function getAbsensi()
    {
        return $this->absensi;
    }

    public function setAbsensi($absensi)
    {
        $this->absensi = $absensi;
    }


    
}

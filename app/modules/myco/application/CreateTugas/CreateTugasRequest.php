<?php


namespace Index\Modules\MyCo\Application\CreateTugas;


class CreateTugasRequest
{
    private $tugas;
    private $pegawai;
    private $tenggatWaktu;
    
    public function __construct($tugas, $pegawai, $tenggatWaktu)
    {
        $this->tugas = $tugas;
        $this->pegawai = $pegawai;
        $this->tenggatWaktu = $tenggatWaktu;
    }


    public function getTugas()
    {
        return $this->tugas;
    }


    public function setTugas($tugas)
    {
        $this->tugas = $tugas;
    }

    public function getPegawai()
    {
        return $this->pegawai;
    }

    public function setPegawai($pegawai)
    {
        $this->pegawai = $pegawai;
    }

    public function getTenggatWaktu()
    {
        return $this->tenggatWaktu;
    }

    public function setTenggatWaktu($tenggatWaktu)
    {
        $this->tenggatWaktu = $tenggatWaktu;
    }

    
}

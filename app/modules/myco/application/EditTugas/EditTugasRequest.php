<?php


namespace Index\Modules\MyCo\Application\EditTugas;


class EditTugasRequest
{
    private $id;
    private $tugas;
    private $pegawai;
    private $tenggatWaktu;
    private $status;
    
    public function __construct($id, $tugas, $pegawai, $tenggatWaktu, $status)
    {
        $this->id = $id;
        $this->tugas = $tugas;
        $this->pegawai = $pegawai;
        $this->tenggatWaktu = $tenggatWaktu;
        $this->status = $status;
    }
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
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

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    
}

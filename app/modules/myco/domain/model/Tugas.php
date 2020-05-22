<?php
namespace Index\Modules\MyCo\Domain\Model;

class Tugas
{
    private TugasId $id;
    private $nama;
    private $pegawai;
    private $tenggatWaktu;
    private $status;

    public function __construct($id,$nama,$pegawai,$tenggatWaktu,$status)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->pegawai = $pegawai;
        $this->tenggatWaktu = $tenggatWaktu;
        $this->status = $status;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getPegawai(){
        return $this->pegawai;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getTenggatWaktu()
    {
        return $this->tenggatWaktu;
    }
}

<?php
namespace Index\Modules\MyCo\Domain\Model;

class Tugas
{
    private $id;
    private $nama;
    private $tenggatWaktu;
    private $status;

    public function __construct(TugasId $id,$nama,$tenggatWaktu,$status)
    {
        $this->id = $id;
        $this->nama = $nama;
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

    public function getStatus()
    {
        return $this->status;
    }

    public function getTenggatWaktu()
    {
        return $this->tenggatWaktu;
    }

    public function isTelat()
    {
        date_default_timezone_set("Asia/Jakarta");
        return $this->getTenggatWaktu() < date('yyyy-mm-dd h:i:s', time());
    }
}

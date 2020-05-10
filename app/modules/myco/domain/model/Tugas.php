<?php
namespace Index\Modules\MyCo\Domain\Model;

class Tugas
{
    private $nama;
    private $detail;
    private $timestamp;
    private $status;

    public function __construct($nama,$detail,$timestamp,$status)
    {
        $this->nama = $nama;
        $this->detail = $detail;
        $this->timestamp = $timestamp;
        $this->status = $status;
    }


    public function getNama()
    {
        return $this->nama;
    }

    public function getDetail()
    {
        return $this->detail;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }


    public static function createTugas($nama,$detail,$timestamp,$status) : Tugas
    {
        return new Tugas($nama, $detail, $timestamp, $status);
    }
}

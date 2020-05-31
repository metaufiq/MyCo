<?php

namespace Index\Modules\MyCo\Domain\Model;

class Gaji {
    private $bulan;
    private $upah_laukpauk;
    private $upah_renumerasi;
    private $upah_kehadiran;

    public function __construct($bulan, $upah_laukpauk,$upah_renumerasi,$upah_kehadiran)
    {
        $this->bulan = $bulan;
        $this->upah_laukpauk = $upah_laukpauk;
        $this->upah_renumerasi = $upah_renumerasi;
        $this->upah_kehadiran = $upah_kehadiran;
    }

    public function getBulan(){
        return $this->bulan;
    }
    public function getUpahLaukPauk(){
        return number_format($this->upah_laukpauk);
    }
    public function getUpahRenumerasi(){
        return number_format($this->upah_renumerasi);
    }
    public function getUpahKehadiran(){
        return number_format($this->upah_kehadiran);
    }

}
<?php

namespace Index\Modules\MyCo\Domain\Model;

class Gaji {
    private $upah_laukpauk;
    private $upah_renumerasi;
    private $upah_kehadiran;

    public function __construct($upah_laukpauk,$upah_renumerasi,$upah_kehadiran)
    {
        $this->upah_laukpauk = $upah_laukpauk;
        $this->upah_renumerasi = $upah_renumerasi;
        $this->upah_kehadiran = $upah_kehadiran;
    }

    public function getUpahLaukPauk(){
        return $this->upah_laukpauk;
    }
    public function geUpahRenumerasi(){
        return $this->upah_renumerasi;
    }
    public function getUpahKehadiran(){
        return $this->upah_kehadiran;
    }

}
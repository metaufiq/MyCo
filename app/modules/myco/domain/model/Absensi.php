<?php

namespace Index\Modules\MyCo\Domain\Model;

class Absensi {
    private $tanggal;
    private $mulai_kerja;
    private $selesai_kerja;
    private $status;

    public function __construct($tanggal,$mulai_kerja,$selesai_kerja)
    {
        $this->tanggal = $tanggal;
        $this->mulai_kerja = $mulai_kerja;
        $this->selesai_kerja = $selesai_kerja;
        $this->status = null;        
    }

    public function getTanggal(){
        return $this->tanggal;
    }
    public function getMulaiKerja(){
        return $this->mulai_kerja;
    }
    public function getSelesaiKerja(){
        return $this->selesai_kerja;
    }
    public function getStatus() {
        if(isset($this->mulai_kerja)) {
            if(isset($this->selesai_kerja)) $this->status = 'Hadir';
            else $this->status = 'Tidak hadir';
        }
        else $this->status = 'Tidak hadir';

        return $this->status;
    }
}
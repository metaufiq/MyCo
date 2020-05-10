<?php
namespace Index\Modules\MyCo\Application;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\Tugas;

class TugasMapper{

    public $pegawaiAndTugas = [];
    public function __construct(array $allTugas)
    {
        foreach ($allTugas as $tugas) {
            $pegawai = new Pegawai($tugas['id_pegawai'],$tugas['nama_pegawai']);
            $newTugas = new Tugas($tugas['id_tugas'],$tugas['nama_tugas'],$pegawai, $tugas['tenggat_waktu'], $tugas['status']);
            // if (end($this->pegawaiAndTugas)->getIdTugas() == $newTugas->getIdTugas()) {
            //     $this->pegawaiAndTugas[count($this->pegawaiAndTugas)-1] = new Tugas($tugas['id_tugas'],$tugas['nama_tugas'],[$pegawai], $tugas['tenggat_waktu'], $tugas['status'])
            // }
            array_push($this->pegawaiAndTugas, $newTugas);
        }
    }


    public function get() : array
    {
        return $this->pegawaiAndTugas;
    }
}
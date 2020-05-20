<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\Absensi;

class AbsensiMapper
{

    protected $pegawai = [];
    public function __construct(array $absensiPegawai)
    {
        foreach ($absensiPegawai as $absensi) {
            $newAbsensi = new Absensi($absensi['tanggal'], $absensi['masuk'], $absensi['selesai']);
            $newPegawai = new Pegawai($absensi['pegawai_id'], $absensi['nama'], null, null, $newAbsensi, null, null);
            
            array_push($this->pegawai, $newPegawai);
        }

    }

    public function get(): array
    {
        return $this->pegawai;
    }
}

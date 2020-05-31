<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\PegawaiId;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;
use Index\Modules\MyCo\Domain\Model\Absensi;

class AbsensiMapper
{

    protected $pegawai = [];
    public function __construct(array $absensiPegawai)
    {
        foreach ($absensiPegawai as $absensi) {
            $newAbsensi = new Absensi($absensi['tanggal'], $absensi['masuk'], $absensi['selesai']);
            $tingkatId = new TingkatPegawaiId($absensi['tingkat_id']);
            $newPegawai = new Pegawai(new PegawaiId($absensi['pegawai_id']), $absensi['nama'], null, null, $newAbsensi, null, $tingkatId);
            
            array_push($this->pegawai, $newPegawai);
        }

    }

    public function get(): array
    {
        return $this->pegawai;
    }
}

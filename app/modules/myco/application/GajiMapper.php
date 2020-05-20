<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\Gaji;

class GajiMapper
{

    protected $pegawai = [];
    public function __construct(array $gajiPegawai)
    {
        foreach ($gajiPegawai as $gaji) {
            $newGaji = new Gaji($gaji['bulan'],$gaji['upah_laukpauk'], $gaji['upah_renum'], $gaji['upah_hadir']);
            $newPegawai = new Pegawai(null, $gaji['nama'], null, null, null, $newGaji, null);
            
            array_push($this->pegawai, $newPegawai);
        }

    }

    public function get(): array
    {
        return $this->pegawai;
    }
}

<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\TingkatPegawai;

class TingkatPegawaiMapper
{

    protected $tingkatPegawai = [];
    public function __construct(array $allTingkat)
    {
        foreach ($allTingkat as $tingkat) {
            
            $newTingkat = new TingkatPegawai($tingkat['id'], $tingkat['tingkat_nama'], $tingkat['tingkat_jenis'], $tingkat['tingkat_golongan'], $tingkat['tingkat_pendidikan'], $tingkat['tingkat_lamakerja'], $tingkat['tingkat_gaji'] );
            
            array_push($this->tingkatPegawai, $newTingkat);
        }

    }

    public function get(): array
    {
        return $this->tingkatPegawai;
    }
}

<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;

class PegawaiMapper
{

    protected $pegawai = [];
    public function __construct(array $allPegawai)
    {
        foreach ($allPegawai as $pegawai) {
            
            $newPegawai = new Pegawai($pegawai['id'], $pegawai['nama'], $pegawai['alamat'], $pegawai['no_hp'] );
            
            array_push($this->pegawai, $newPegawai);
        }

    }

    public function get(): array
    {
        return $this->pegawai;
    }
}

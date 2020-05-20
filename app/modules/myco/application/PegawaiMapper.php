<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;

class PegawaiMapper
{

    protected $pegawai = [];
    public function __construct(array $allPegawai)
    {
        foreach ($allPegawai as $pegawai) {
            
            $tingkatPegawai = new TingkatPegawai(null, $pegawai['tingkat_nama'],null,null,null,null,null);
            $newPegawai = new Pegawai($pegawai['id'], $pegawai['nama'], $pegawai['alamat'], $pegawai['no_hp'], null, null, $tingkatPegawai);
            
            array_push($this->pegawai, $newPegawai);
        }

    }

    public function get(): array
    {
        return $this->pegawai;
    }
}

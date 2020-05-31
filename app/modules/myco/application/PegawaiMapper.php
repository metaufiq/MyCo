<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;

class PegawaiMapper
{

    protected $allData = [];
    public function __construct(array $allData)
    {
        $this->allData = $allData;
    }

    public function get(): array
    {
        $result = array();
        foreach($this->allData as $data) {
            $newData = array(
                'id' => $data['pegawai']->getId(),
                'nama' => $data['pegawai']->getNama(),
                'alamat' => $data['pegawai']->getAlamat(),
                'no_hp' => $data['pegawai']->getNoHp(),
                'tingkat_id' => $data['tingkat']->getId(),
                'tingkat_nama' => $data['tingkat']->getNama()
            );
            array_push($result, $newData);
        }

        return $result;
    }
}

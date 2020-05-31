<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\TingkatPegawai;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;

class TingkatPegawaiMapper
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
                'id' => $data->getId(),
                'nama' => $data->getNama(),
                'jenis' => $data->getJenis(),
                'golongan' => $data->getGolongan(),
                'pendidikan' => $data->getPendidikan(),
                'lamakerja' => $data->getLamaKerja(),
                'gaji_dasar' => $data->getGajiDasar()
            );
            array_push($result, $newData);
        }

        return $result;
    }
}

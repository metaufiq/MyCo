<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\PegawaiId;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;
use Index\Modules\MyCo\Domain\Model\Absensi;

class AbsensiMapper
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
                'tanggal' => $data->getAbsensi()->getTanggal(),
                'mulai' => $data->getAbsensi()->getMulaiKerja(),
                'selesai' => $data->getAbsensi()->getSelesaiKerja(),
                'status' => $data->getAbsensi()->getStatus()
            );
            array_push($result, $newData);
        }

        return $result;
    }
}

<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\PegawaiId;
use Index\Modules\MyCo\Domain\Model\Gaji;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;

class GajiMapper
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
                'tingkat_id' => $data['tingkat']->getId(),
                'bulan' => $data['pegawai']->getGaji()->getBulan(),
                'gaji_dasar' => $data['tingkat']->getGajiDasar(),
                'upah_laukpauk' => $data['pegawai']->getGaji()->getUpahLaukPauk(),
                'upah_hadir' => $data['pegawai']->getGaji()->getUpahKehadiran(),
                'upah_renum' => $data['pegawai']->getGaji()->getUpahRenumerasi()
            );
            array_push($result, $newData);
        }
        return $result;
    }
}

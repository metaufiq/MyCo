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
                'gaji_dasar' => "Rp. " . $data['tingkat']->getGajiDasar() . ".00",
                'upah_laukpauk' => "Rp. " . $data['pegawai']->getGaji()->getUpahLaukPauk() . ".00",
                'upah_hadir' => "Rp. " . $data['pegawai']->getGaji()->getUpahKehadiran() . ".00",
                'upah_renum' => "Rp. " . $data['pegawai']->getGaji()->getUpahRenumerasi() . ".00"
            );
            array_push($result, $newData);
        }
        return $result;
    }
}

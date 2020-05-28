<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;

class TugasMapper
{

    protected $allData = [];
    public function __construct(array $allData)
    {
        $this->allData = $allData;
    }

    public function get(): array
    {

        $result = array();
        foreach ($this->allData as $data) {
            $newData = array(
                'id' => $data['tugas']->getId()->getId(),
                'tugas' => $data['tugas']->getNama(),
                'pegawai' => $data['pegawai'],
                'tenggatWaktu' => $data['tugas']->getTenggatWaktu(),
                'status' => array(
                    'id' => $data['tugas']->getStatus()->getId(),
                    'nama' => $data['tugas']->getStatus()->getNama()
                )
            );

            array_push($result, $newData);
        }
        return $result;
    }
}

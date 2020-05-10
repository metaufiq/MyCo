<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\Tugas;

class TugasMapper
{

    protected $pegawaiAndTugas = [];
    public function __construct(array $allTugas)
    {
        $temp = [];
        foreach ($allTugas as $tugas) {
            // if (end($this->pegawaiAndTugas)->getIdTugas() == $newTugas->getIdTugas()) {
            //     $this->pegawaiAndTugas[count($this->pegawaiAndTugas)-1] = new Tugas($tugas['id_tugas'],$tugas['nama_tugas'],[$pegawai], $tugas['tenggat_waktu'], $tugas['status'])
            // }
            $newTugas = array(
                'tugas' => array(
                    'id' => $tugas['id_tugas'],
                    'nama' => $tugas['nama_tugas']
                ),
                'pegawai' => array(
                    array(
                        'id' => $tugas['id_pegawai'],
                        'nama' => $tugas['nama_pegawai']
                    )
                ),
                'tenggatWaktu' => $tugas['tenggat_waktu'],
                'status' => $tugas['status']
            );
            if (!empty($temp)) {
                if (end($temp)['tugas']['id'] == $newTugas['tugas']['id']) {
                    $temp[count($temp) - 1]['pegawai'] = array_merge($temp[count($temp) - 1]['pegawai'], $newTugas['pegawai']);
                    continue;
                }
            }

            array_push($temp, $newTugas);
        }

        foreach ($temp as $tugas) {
            $allPegawai = [];
            foreach ($tugas['pegawai'] as $pegawai ) {
                $pegawai = new Pegawai($pegawai['id'], $pegawai['nama']);
                array_push($allPegawai, $pegawai);
            }
            $newTugas = new Tugas($tugas['tugas']['id'], $tugas['tugas']['nama'], $allPegawai, $tugas['tenggatWaktu'], $tugas['status']);
            
            array_push($this->pegawaiAndTugas, $newTugas);
        }
    }


    public function get(): array
    {
        return $this->pegawaiAndTugas;
    }
}

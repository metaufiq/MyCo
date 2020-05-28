<?php

namespace Index\Modules\MyCo\Application\ViewAllTugas;

use Index\Modules\MyCo\Application\TugasMapper;
use Index\Modules\MyCo\Domain\Model\TugasId;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;


class ViewAllTugasService
{

    protected $tugasRepository;
    protected $pegawaiRepository;
    public function __construct(TugasRepository $tugasRepository, PegawaiRepository $pegawaiRepository)
    {
        $this->tugasRepository = $tugasRepository;
        $this->pegawaiRepository = $pegawaiRepository;
    }


    public function handle()
    {
        $allTugas = $this->tugasRepository->getAll();

        $result = array();
        foreach ($allTugas as $tugas) {
            $newData = array();
            $tugasId = $tugas->getId();
            $pegawai = $this->pegawaiRepository->getByTugasId($tugasId);
            if ($tugas->isTelat()) {
                $this->tugasRepository->setTelat($tugas);
                $tugas->getStatus()->setTelat();
            }
            $newData['tugas'] = $tugas;
            $newData['pegawai'] = $pegawai;

            array_push($result, $newData);
        }
        return new TugasMapper($result);
    }
}

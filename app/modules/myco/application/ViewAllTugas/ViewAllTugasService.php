<?php

namespace Index\Modules\MyCo\Application\ViewAllTugas;

use Index\Modules\MyCo\Application\TugasMapper;
use Index\Modules\MyCo\Domain\Model\TugasId;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;


class ViewAllTugasService{

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
        

        foreach ($allTugas as &$tugas) {
            $tugasId = new TugasId($tugas['id']);
            $pegawai = $this->pegawaiRepository->getByTugasId($tugasId);
            $tugas['pegawai'] = $pegawai;
        }
        return new TugasMapper($allTugas);
    }
}
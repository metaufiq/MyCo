<?php

namespace Index\Modules\MyCo\Application\ViewAllTugas;

use Index\Modules\MyCo\Application\TugasMapper;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;


class ViewAllTugasService{

    protected $tugasRepository;

    public function __construct(TugasRepository $tugasRepository)
    {
        $this->tugasRepository = $tugasRepository;
    }


    public function handle()
    {
        $allTugas = $this->tugasRepository->getAll();
        die(json_encode($allTugas));
        return new TugasMapper($allTugas);
    }
}
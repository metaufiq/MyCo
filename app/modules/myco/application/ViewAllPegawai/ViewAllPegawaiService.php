<?php

namespace Index\Modules\MyCo\Application\ViewAllPegawai;

use Index\Modules\MyCo\Application\PegawaiMapper;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;


class ViewAllPegawaiService{

    protected $pegawaiRepository;

    public function __construct(PegawaiRepository $pegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function handle()
    {
        $allPegawai = $this->pegawaiRepository->getAll();

        return new PegawaiMapper($allPegawai);
    }
}
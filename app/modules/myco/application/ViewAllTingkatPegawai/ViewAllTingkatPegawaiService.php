<?php

namespace Index\Modules\MyCo\Application\ViewAllTingkatPegawai;

use Index\Modules\MyCo\Application\TingkatPegawaiMapper;
use Index\Modules\MyCo\Domain\Repository\TingkatPegawaiRepository;


class ViewAllTingkatPegawaiService{

    protected $tingkatPegawaiRepository;

    public function __construct(TingkatPegawaiRepository $tingkatPegawaiRepository)
    {
        $this->tingkatPegawaiRepository = $tingkatPegawaiRepository;
    }

    public function handle()
    {
        $allTingkat = $this->tingkatPegawaiRepository->getAll();

        return new TingkatPegawaiMapper($allTingkat);
    }
}
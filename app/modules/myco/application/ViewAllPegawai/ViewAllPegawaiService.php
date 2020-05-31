<?php

namespace Index\Modules\MyCo\Application\ViewAllPegawai;

use Index\Modules\MyCo\Application\PegawaiMapper;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;
use Index\Modules\MyCo\Domain\Repository\TingkatPegawaiRepository;

class ViewAllPegawaiService{

    protected $pegawaiRepository;
    protected $tingkatPegawaiRepository;
    public function __construct(PegawaiRepository $pegawaiRepository, TingkatPegawaiRepository $tingkatPegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
        $this->tingkatPegawaiRepository = $tingkatPegawaiRepository;
    }

    public function handle()
    {
        $allPegawai = $this->pegawaiRepository->getAll();
        
        $result = array();
        foreach($allPegawai as $pegawai) {
            $newData = array();
            $tingkatId = $pegawai->getTingkatPegawaiId();
            $tingkat = $this->tingkatPegawaiRepository->getById($tingkatId);
            $newData['pegawai'] = $pegawai;
            $newData['tingkat'] = $tingkat;

            array_push($result, $newData);
        }
        return new PegawaiMapper($result);
    }
}
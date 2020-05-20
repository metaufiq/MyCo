<?php
namespace Index\Modules\MyCo\Application\ViewAbsensiPegawai;

use Index\Modules\MyCo\Application\AbsensiMapper;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;


class ViewAbsensiPegawaiService{
    protected $pegawaiRepository;


    public function __construct(
        PegawaiRepository $pegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function handle() 
    {
        
        $response = $this->pegawaiRepository->getAbsensiPegawai();
        
        return new AbsensiMapper($response);
       
    }
}
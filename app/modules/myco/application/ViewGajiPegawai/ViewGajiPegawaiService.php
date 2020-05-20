<?php
namespace Index\Modules\MyCo\Application\ViewGajiPegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Application\GajiMapper;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;


class ViewGajiPegawaiService{
    protected $pegawaiRepository;


    public function __construct(
        PegawaiRepository $pegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function handle() 
    {
        
        $response = $this->pegawaiRepository->getGajiPegawai();
        
        return new GajiMapper($response);
       
    }
}
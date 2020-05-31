<?php
namespace Index\Modules\MyCo\Application\ViewGajiPegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Application\GajiMapper;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\PegawaiId;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;
use Index\Modules\MyCo\Domain\Repository\TingkatPegawaiRepository;


class ViewGajiPegawaiService{
    protected $pegawaiRepository;
    protected $tingkatPegawaiRepository;

    public function __construct(
        PegawaiRepository $pegawaiRepository, TingkatPegawaiRepository $tingkatPegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
        $this->tingkatPegawaiRepository = $tingkatPegawaiRepository;
    }

    public function handle() 
    {
        
        $allGaji = $this->pegawaiRepository->getGajiPegawai();
        
        $result = array();
        foreach($allGaji as $gajiPegawai) {
            $newData = array();
            $tingkatId = $gajiPegawai->getTingkatPegawaiId();
            $tingkat = $this->tingkatPegawaiRepository->getById($tingkatId);
            $newData['pegawai'] = $gajiPegawai;
            $newData['tingkat'] = $tingkat;

            array_push($result, $newData);
        }

        return new GajiMapper($result);
       
    }
}
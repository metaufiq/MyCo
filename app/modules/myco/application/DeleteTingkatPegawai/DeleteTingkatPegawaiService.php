<?php
namespace Index\Modules\MyCo\Application\DeleteTingkatPegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;
use Index\Modules\MyCo\Domain\Repository\TingkatPegawaiRepository;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;


class DeleteTingkatPegawaiService{
    protected $tingkatPegawaiRepository;

    public function __construct(
        TingkatPegawaiRepository $tingkatPegawaiRepository, PegawaiRepository $pegawaiRepository)
    {
        $this->tingkatPegawaiRepository = $tingkatPegawaiRepository;
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function handle(DeleteTingkatPegawaiRequest $request) : GenericResponse
    {
        try {
            $tingkatId = new TingkatPegawaiId($request->getId());
            $allPegawai = $this->pegawaiRepository->getByTingkatId($tingkatId);
            foreach($allPegawai as $pegawai) {
                $pegawai->pegawaiKosong();
                $this->pegawaiRepository->edit($pegawai);
            }
            
            $response = $this->tingkatPegawaiRepository->delete($tingkatId);
            
            return new GenericResponse($response, "Tingkat Pegawai deleted successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
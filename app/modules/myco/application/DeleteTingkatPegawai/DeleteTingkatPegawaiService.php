<?php
namespace Index\Modules\MyCo\Application\DeleteTingkatPegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;
use Index\Modules\MyCo\Domain\Repository\TingkatPegawaiRepository;


class DeleteTingkatPegawaiService{
    protected $tingkatPegawaiRepository;

    public function __construct(
        TingkatPegawaiRepository $tingkatPegawaiRepository)
    {
        $this->tingkatPegawaiRepository = $tingkatPegawaiRepository;
    }

    public function handle(DeleteTingkatPegawaiRequest $request) : GenericResponse
    {
        try {
            $tingkatId = new TingkatPegawaiId($request->getId());
            $response = $this->tingkatPegawaiRepository->delete($tingkatId);
            
            return new GenericResponse($response, "Tingkat Pegawai deleted successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
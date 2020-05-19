<?php
namespace Index\Modules\MyCo\Application\DeleteTingkatPegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;
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
            $tingkatPegawai = new TingkatPegawai($request->getId(), null, null, null, null, null, null, null);
            $response = $this->tingkatPegawaiRepository->delete($tingkatPegawai);
            
            return new GenericResponse($response, "Tingkat Pegawai deleted successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
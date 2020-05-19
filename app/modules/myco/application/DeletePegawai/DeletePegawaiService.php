<?php
namespace Index\Modules\MyCo\Application\DeletePegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;

class DeletePegawaiService{
    protected $pegawaiRepository;

    public function __construct(
        PegawaiRepository $pegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function handle(DeletePegawaiRequest $request) : GenericResponse
    {
        try {
            $pegawai = new Pegawai($request->getId(), null, null, null);
            $response = $this->pegawaiRepository->delete($pegawai);
            
            return new GenericResponse($response, "Pegawai deleted successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
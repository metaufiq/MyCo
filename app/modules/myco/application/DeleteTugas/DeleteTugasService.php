<?php
namespace Index\Modules\MyCo\Application\DeleteTugas;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Tugas;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;


class DeleteTugasService{
    protected $tugasRepository;


    public function __construct(
        TugasRepository $tugasRepository)
    {
        $this->tugasRepository = $tugasRepository;
    }

    public function handle(DeleteTugasRequest $request) : GenericResponse
    {
        try {
            $tugasId = new TugasId($request->getId());
            $tugas = new Tugas($tugasId, null, null, null);
            $response = $this->tugasRepository->delete($tugas);
            
            return new GenericResponse($response, "Tugas deleted successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
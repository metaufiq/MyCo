<?php
namespace Index\Modules\MyCo\Application\EditTugas;

use Exception;
use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Tugas;
use Index\Modules\MyCo\Domain\Model\TugasId;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;


class EditTugasService{
    protected $tugasRepository;


    public function __construct(
        TugasRepository $tugasRepository)
    {
        $this->tugasRepository = $tugasRepository;
    }

    public function handle(EditTugasRequest $request) : GenericResponse
    {
        try {
            $tugasId = new TugasId($request->getId());
            $tugas = new Tugas($tugasId, $request->getTugas(), $request->getTenggatWaktu(), $request->getStatus());
            $response = $this->tugasRepository->edit($tugas);
            return new GenericResponse($response, "Tugas edited successfully.");
        } catch (\Exception $exception) {
            die($exception);
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
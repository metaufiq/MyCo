<?php
namespace Index\Modules\MyCo\Application\EditTugas;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Tugas;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;


class EditTugasService{
    public $tugasRepository;


    public function __construct(
        TugasRepository $tugasRepository)
    {
        $this->tugasRepository = $tugasRepository;
    }

    public function handle(EditTugasRequest $request) : GenericResponse
    {
        try {
            $tugas = new Tugas($request->getId(), $request->getTugas(), $request->getPegawai(), $request->getTenggatWaktu(), $request->getStatus());
            $response = $this->tugasRepository->edit($tugas);
            
            return new GenericResponse($response, "Tugas edited successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
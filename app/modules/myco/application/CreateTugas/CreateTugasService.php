<?php
namespace Index\Modules\MyCo\Application\CreateTugas;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Tugas;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;


class CreateTugasService{
    public $tugasRepository;


    public function __construct(
        TugasRepository $tugasRepository)
    {
        $this->tugasRepository = $tugasRepository;
    }

    public function handle(CreateTugasRequest $request) : GenericResponse
    {
        try {
            $tugas = new Tugas(null, $request->getTugas(), $request->getPegawai(), $request->getTenggatWaktu(), 1);
            $response = $this->tugasRepository->save($tugas);
            
            return new GenericResponse($response, "Idea created successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
<?php
namespace Index\Modules\MyCo\Application\CreateTugas;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\Tugas;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;


class CreateTugasService{
    protected $tugasRepository;
    protected $pegawaiRepository;

    public function __construct(
        TugasRepository $tugasRepository, PegawaiRepository $pegawaiRepository)
    {
        $this->tugasRepository = $tugasRepository;
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function handle(CreateTugasRequest $request) : GenericResponse
    {
        try {
            
            $tugas = new Tugas(null, $request->getTugas(),  $request->getTenggatWaktu(), 1);
            $response = $this->tugasRepository->save($tugas);
            
            $tugasId = $this->tugasRepository->getLatestInsertedId();
            foreach ($request->getPegawai() as $pegawaiId) {
                $pegawai = new Pegawai($pegawaiId, null, null, null, null, null, null, null, null, null, null);
                $this->pegawaiRepository->setTugasPegawai($pegawai, $tugasId);
            }
            return new GenericResponse($response, "Tugas created successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
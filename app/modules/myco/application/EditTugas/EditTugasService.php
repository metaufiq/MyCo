<?php
namespace Index\Modules\MyCo\Application\EditTugas;

use Exception;
use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\Tugas;
use Index\Modules\MyCo\Domain\Model\TugasId;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;
use Index\Modules\MyCo\Domain\Repository\TugasRepository;


class EditTugasService{
    protected $tugasRepository;
    protected $pegawaiRepository;

    public function __construct(
        TugasRepository $tugasRepository, PegawaiRepository $pegawaiRepository)
    {
        $this->tugasRepository = $tugasRepository;
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function handle(EditTugasRequest $request) : GenericResponse
    {
        try {
            $tugasId = new TugasId($request->getId());
            $tugas = new Tugas($tugasId, $request->getTugas(), $request->getTenggatWaktu(), $request->getStatus());
            $this->tugasRepository->edit($tugas);
            $this->pegawaiRepository->deleteAllTugasPegawaiByTugasId($tugasId);
            foreach ($request->getPegawai() as $pegawaiId) {
                $pegawai = new Pegawai($pegawaiId, null, null, null, null, null, null, null, null, null, null);
                $this->pegawaiRepository->createTugasPegawai($pegawai, $tugasId);
            }
            return new GenericResponse($response, "Tugas edited successfully.");
        } catch (\Exception $exception) {
            die($exception);
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
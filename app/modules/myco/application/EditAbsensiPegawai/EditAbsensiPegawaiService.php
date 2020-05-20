<?php
namespace Index\Modules\MyCo\Application\EditAbsensiPegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;


class EditAbsensiPegawaiService{
    protected $pegawaiRepository;

    public function __construct(
        PegawaiRepository $pegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function handle(EditAbsensiPegawaiRequest $request) : GenericResponse
    {
        try {
            $pegawai = new Pegawai($request->getIdPegawai(), null, null, null, $request->getAbsensi(), null, null);
            $response = $this->pegawaiRepository->editAbsensi($pegawai);
            
            return new GenericResponse($response, "Absensi pegawai edited successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
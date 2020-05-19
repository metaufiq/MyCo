<?php
namespace Index\Modules\MyCo\Application\EditPegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;

class EditPegawaiService{
    protected $pegawaiRepository;

    public function __construct(
        PegawaiRepository $pegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function handle(EditPegawaiRequest $request) : GenericResponse
    {
        try {
            $pegawai = new Pegawai($request->getId(), $request->getNama(), $request->getAlamat(), $request->getNoHp());
            $response = $this->pegawaiRepository->edit($pegawai);
            
            return new GenericResponse($response, "Pegawai edited successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
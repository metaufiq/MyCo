<?php
namespace Index\Modules\MyCo\Application\CreatePegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Repository\PegawaiRepository;


class CreatePegawaiService{
    protected $pegawaiRepository;

    public function __construct(
        PegawaiRepository $pegawaiRepository)
    {
        $this->pegawaiRepository = $pegawaiRepository;
    }

    public function handle(CreatePegawaiRequest $request) : GenericResponse
    {
        try {
            $pegawai = new Pegawai(NULL, $request->getNama(), $request->getAlamat(), $request->getNoHp());
            $response = $this->pegawaiRepository->save($pegawai);
            
            return new GenericResponse($response, "Pegawai baru telah berhasil ditambahkan.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
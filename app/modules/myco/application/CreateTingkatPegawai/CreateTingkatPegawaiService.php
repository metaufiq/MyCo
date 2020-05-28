<?php
namespace Index\Modules\MyCo\Application\CreateTingkatPegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;
use Index\Modules\MyCo\Domain\Repository\TingkatPegawaiRepository;


class CreateTingkatPegawaiService{
    protected $tingkatPegawaiRepository;

    public function __construct(
        TingkatPegawaiRepository $tingkatPegawaiRepository)
    {
        $this->tingkatPegawaiRepository = $tingkatPegawaiRepository;
    }

    public function handle(CreateTingkatPegawaiRequest $request) : GenericResponse
    {
        try {
            $tingkatPegawai = new TingkatPegawai(NULL, $request->getNama(), $request->getJenis(), $request->getGolongan(), $request->getPendidikan(), $request->getLamaKerja(), $request->getGajiDasar());
            $response = $this->tingkatPegawaiRepository->create($tingkatPegawai);
            
            return new GenericResponse($response, "Tingkat Pegawai baru telah berhasil ditambahkan.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
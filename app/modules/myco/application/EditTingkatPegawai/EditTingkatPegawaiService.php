<?php
namespace Index\Modules\MyCo\Application\EditTingkatPegawai;

use Index\Modules\MyCo\Application\GenericResponse;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;
use Index\Modules\MyCo\Domain\Repository\TingkatPegawaiRepository;


class EditTingkatPegawaiService{
    protected $tingkatPegawaiRepository;

    public function __construct(
        TingkatPegawaiRepository $tingkatPegawaiRepository)
    {
        $this->tingkatPegawaiRepository = $tingkatPegawaiRepository;
    }

    public function handle(EditTingkatPegawaiRequest $request) : GenericResponse
    {
        try {
            $tingkatId = new TingkatPegawaiId($request->getId());
            $tingkatPegawai = new TingkatPegawai($tingkatId, $request->getNama(), $request->getJenis(), $request->getGolongan(), $request->getPendidikan(), $request->getLamaKerja(), $request->getGajiDasar());
            $response = $this->tingkatPegawaiRepository->edit($tingkatPegawai);
            
            return new GenericResponse($response, "Tingkat Pegawai edited successfully.");
        } catch (\Exception $exception) {
            return new GenericResponse($exception, $exception->getMessage(), 500, true);
        }
    }
}
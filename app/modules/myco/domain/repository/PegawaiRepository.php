<?php
namespace Index\Modules\MyCo\Domain\Repository;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\PegawaiId;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;
use Index\Modules\MyCo\Domain\Model\TugasId;

interface PegawaiRepository{
    public function create(Pegawai $pegawai);

    public function createTugasPegawai(Pegawai $pegawai, TugasId $tugasId);

    public function getAll();

    public function getById(PegawaiId $id);

    public function delete(Pegawai $pegawai);
    public function deleteAllTugasPegawaiByTugasId(TugasId $tugasId);

    public function edit(Pegawai $pegawai);

    public function getGajiPegawai();

    public function getAbsensiPegawai();

    public function getByTugasId(TugasId $tugasId);

    public function getByTingkatId(TingkatPegawaiId $tingkatId);

    public function getAbsensiById(PegawaiId $pegawaiId);

    public function editAbsensi(Pegawai $pegawai);
}
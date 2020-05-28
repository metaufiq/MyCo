<?php
namespace Index\Modules\MyCo\Domain\Repository;
use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\TugasId;

interface PegawaiRepository{
    public function save(Pegawai $pegawai);

    public function setTugasPegawai(Pegawai $pegawai, TugasId $tugasId);
    public function getAll();

    public function delete(Pegawai $pegawai);

    public function edit(Pegawai $pegawai);

    public function getGajiPegawai();

    public function getAbsensiPegawai();

    public function getByTugasId(TugasId $tugasId);

    public function editAbsensi(Pegawai $pegawai);
}
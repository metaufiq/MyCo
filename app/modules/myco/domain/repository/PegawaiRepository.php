<?php
namespace Index\Modules\MyCo\Domain\Repository;
use Index\Modules\MyCo\Domain\Model\Pegawai;
interface PegawaiRepository{
    public function save(Pegawai $pegawai);

    public function getAll();

    public function delete(Pegawai $pegawai);

    public function edit(Pegawai $pegawai);

    public function getGajiPegawai();

    public function getAbsensiPegawai();

    public function editAbsensi(Pegawai $pegawai);
}
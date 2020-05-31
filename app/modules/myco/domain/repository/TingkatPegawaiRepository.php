<?php
namespace Index\Modules\MyCo\Domain\Repository;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;
use Index\Modules\MyCo\Domain\Model\TingkatPegawaiId;
interface TingkatPegawaiRepository{
    public function create(TingkatPegawai $tingkatPegawai);

    public function getAll();

    public function getById(TingkatPegawaiId $id);

    public function delete(TingkatPegawai $tingkatPegawai);

    public function edit(TingkatPegawai $tingkatPegawai);
}
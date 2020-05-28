<?php
namespace Index\Modules\MyCo\Domain\Repository;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;
interface TingkatPegawaiRepository{
    public function create(TingkatPegawai $tingkatPegawai);

    public function getAll();

    public function delete(TingkatPegawai $tingkatPegawai);

    public function edit(TingkatPegawai $tingkatPegawai);
}
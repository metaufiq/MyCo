<?php
namespace Index\Modules\MyCo\Domain\Repository;
use Index\Modules\MyCo\Domain\Model\Tugas;

interface TugasRepository{
    public function create(Tugas $tugas);

    public function getAll();

    public function getLatestInsertedId();

    public function getById(Tugas $tugas);

    public function delete(Tugas $tugas);

    public function edit(Tugas $tugas);

    public function setTelat(Tugas $tugas);

}
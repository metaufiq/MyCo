<?php
namespace Index\Modules\MyCo\Domain\Repository;

use Index\Modules\MyCo\Domain\Model\Manajer;
interface ManajerRepository{
    public function save(Manajer $manajer);

    // public function getAll();

    // public function delete(Manajer $manajer);

    // public function edit(Manajer $manajer);
}
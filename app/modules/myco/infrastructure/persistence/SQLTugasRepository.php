<?php
namespace Index\Modules\MyCo\Infrastructure\Persistence;

use Index\Modules\MyCo\Domain\Repository\TugasRepository;

class SqlTugasRepository implements TugasRepository
{
    // public function save(Tugas $tugas){
    //     return "simpan tugas";
    // }
    
    public function getAll(){
        return "ambil semua tugas";
    }

    // public function delete(Tugas $tugas){
    //     return "delete tugas";
    // }

    // public function edit(Tugas $tugas){
    //     return "edit tugas";
    // }

}
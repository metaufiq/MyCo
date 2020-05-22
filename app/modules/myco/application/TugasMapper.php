<?php

namespace Index\Modules\MyCo\Application;

use Index\Modules\MyCo\Domain\Model\Pegawai;
use Index\Modules\MyCo\Domain\Model\TingkatPegawai;

class TugasMapper
{

    protected $allTugas = [];
    public function __construct(array $allTugas)
    {
        $this->allTugas = $allTugas;

    }

    public function get(): array
    {   
        foreach ($this->allTugas as &$tugas) {
            $tugas['status'] = array('id' =>  $tugas['status_id'], 'status'=>$tugas['status']);
            unset($tugas['id_status']);    
        }
        return $this->allTugas;
    }
}

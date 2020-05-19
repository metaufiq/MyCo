<?php

namespace Index\Modules\MyCo\Application\DeletePegawai;

class DeletePegawaiRequest
{
    private $id;
    
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
}

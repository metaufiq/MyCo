<?php

namespace Index\Modules\MyCo\Domain\Model;



class Pegawai {
    private $id;
    private $nama;
    private $alamat;
    private $no_hp;


    public function __construct($id, $nama, $alamat, $no_hp)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->no_hp = $no_hp;
    }

    public function getId(){
        return $this->id;
    }

    public function getNama(){
        return $this->nama;
    }

    public function getAlamat(){
        return $this->alamat;
    }

    public function getNoHp(){
        return $this->no_hp;
    }

}
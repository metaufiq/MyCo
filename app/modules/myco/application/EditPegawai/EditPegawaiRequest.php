<?php

namespace Index\Modules\MyCo\Application\EditPegawai;

class EditPegawaiRequest
{
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
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getAlamat()
    {
        return $this->alamat;
    }

    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }

    public function getNoHp()
    {
        return $this->no_hp;
    }

    public function setNoHp($no_hp)
    {
        $this->no_hp = $no_hp;
    }
    
}

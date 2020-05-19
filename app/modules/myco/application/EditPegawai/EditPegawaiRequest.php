<?php

namespace Index\Modules\MyCo\Application\EditPegawai;

class EditPegawaiRequest
{
    private $id;
    private $nama;
    private $alamat;
    private $no_hp;
    private $tingkat_pegawai;

    public function __construct($id, $nama, $alamat, $no_hp, $tingkat_pegawai)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->no_hp = $no_hp;
        $this->tingkat_pegawai = $tingkat_pegawai;
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

    public function getTingkatPegawai()
    {
        return $this->tingkat_pegawai;
    }

    public function setTingkatPegawai($tingkat_pegawai)
    {
        $this->tingkat_pegawai = $tingkat_pegawai;
    }
    
}

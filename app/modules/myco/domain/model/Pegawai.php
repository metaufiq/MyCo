<?php

namespace Index\Modules\MyCo\Domain\Model;

class Pegawai {
    private $id;
    private $nama;
    private $alamat;
    private $no_hp;
    private $absensi;
    private $gaji;
    private $tingkat_pegawai;

    public function __construct($id, $nama, $alamat, $no_hp, $absensi, $gaji, $tingkat_pegawai)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->no_hp = $no_hp;
        $this->absensi = $absensi;
        $this->gaji = $gaji;
        $this->tingkat_pegawai = $tingkat_pegawai;
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

    public function getGaji(){
        return $this->gaji;
    }

    public function getAbsensi(){
        return $this->absensi;
    }

    public function getTingkatPegawai(){
        return $this->tingkat_pegawai;
    }

}
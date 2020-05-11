<?php


namespace Index\Modules\MyCo\Application\CreateManajer;


class CreateManajerRequest
{
    private $nama;
    private $email;
    private $password;
    
    public function __construct($nama, $email, $password)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->password = $password;
    }


    public function getNama()
    {
        return $this->nama;
    }


    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    
}

<?php
namespace Index\Modules\MyCo\Domain\Model;

class TugasStatus
{
    private $id;
    private $nama;

    public function __construct(int $id, string $nama)
    {
        $this->id = $id;
        $this->nama = $nama;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function getNama():string
    {
        return $this->nama;
    }

    public function setTelat()
    {
        $this->id = 0;
        $this->nama = 'Telat';
    }
}

<?php
namespace Index\Modules\MyCo\Domain\Model;

class TingkatPegawaiId
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId():int
    {
        return $this->id;
    }

}

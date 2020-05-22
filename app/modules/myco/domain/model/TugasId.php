<?php
namespace Index\Modules\MyCo\Domain\Model;

class TugasId
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

<?php

namespace App\Model;

class Admin
{
    private $id;

    private $cpf;

    private $isMaster;

    use App\Traits\DehydrateClass;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getIsMaster()
    {
        return $this->isMaster;
    }

    public function setIsMaster($isMaster)
    {
        $this->isMaster = $isMaster;
    }
}
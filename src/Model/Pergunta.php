<?php

namespace App\Model;

class Pergunta
{
    private $id;

    private $descricao;

    private $ordem;

    private $status;

    private $ativa;

    use App\Traits\DehydrateClass;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getOrdem()
    {
        return $this->ordem;
    }

    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
    }

    public function getAtiva(){
        return $this->ativa;
    }

    public function setAtiva($ativa){
        $this->ativa = $ativa;
    }
}
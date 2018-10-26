<?php

namespace App\Model;

class StatusIndicacao
{
    private $id;

    private $nome;

    private $descricao;

    private $ordem;

    private $enviarEmail;

    use App\Traits\DehydrateClass;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setOrdem($ordem)
    {
        $this->ordem = $ordem;
    }

    public function getOrdem()
    {
        return $this->ordem;
    }

    public function getEnviarEmail()
    {
        return $this->enviarEmail;
    }

    public function setEnviarEmail($enviarEmail)
    {
        $this->enviarEmail = $enviarEmail;
    }
}
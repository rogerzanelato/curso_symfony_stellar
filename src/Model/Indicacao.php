<?php

namespace App\Model;

class Indicacao
{
    private $id;

    private $indicante;

    private $candidato;

    private $tipoindicacao;

    use App\Traits\DehydrateClass;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIndicante()
    {
        return $this->indicante;
    }

    public function setIndicante(Indicante $indicante)
    {
        $this->indicante = $indicante;
    }

    public function getCandidato()
    {
        return $this->candidato;
    }

    public function setCandidato(Candidato $candidato)
    {
        $this->candidato = $candidato;
    }

    public function getTipoindicacao()
    {
        return $this->tipoindicacao;
    }

    public function setTipoindicacao($tipoindicacao)
    {
        $this->tipoindicacao = $tipoindicacao;
    }
}
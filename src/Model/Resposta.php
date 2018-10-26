<?php

namespace App\Model;

class Resposta
{
    private $id;

    private $pergunta;

    private $resposta;

    use App\Traits\DehydrateClass;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getPergunta(){
        return $this->pergunta;
    }

    public function setPergunta(Pergunta $pergunta){
        $this->pergunta = $pergunta;
    }

    public function getResposta(){
        return $this->resposta;
    }

    public function setResposta($resposta){
        $this->resposta = $resposta;
    }
}
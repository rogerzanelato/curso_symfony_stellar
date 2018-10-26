<?php

namespace App\Model;

class Candidato
{
    private $id;

    private $nome;

    private $dataNascimento;

    private $email;

    private $cpf;

    private $ddd;

    private $telefone;

    private $cidade;

    private $cargoPretendido;
    
    private $mensagem;

    private $curriculo;

    private $foto;

    /**
     * @var Resposta[] Array de respostas do candidato
     */
    private $respostas = [];

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

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getDdd()
    {
        return $this->ddd;
    }

    public function setDdd($ddd)
    {
        $this->ddd = $ddd;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getCargoPretendido()
    {
        return $this->cargoPretendido;
    }

    public function setCargoPretendido($cargoPretendido)
    {
        $this->cargoPretendido = $cargoPretendido;
    }

    public function getMensagem()
    {
        return $this->mensagem;
    }

    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function getCurriculo()
    {
        return $this->curriculo;
    }

    public function setCurriculo($curriculo)
    {
        $this->curriculo = $curriculo;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getRespostas()
    {
        return $this->respostas;
    }

    public function cleanRespostas()
    {
        return $this->respostas = [];
    }

    public function addResposta(Resposta $resposta)
    {
        $this->respostas[] = $respostas;
    }
}

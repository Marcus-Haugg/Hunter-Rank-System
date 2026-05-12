<?php

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $nivel;
    private $classe;

    public function __construct($nome, $email, $senha, $nivel, $classe, $id = null)
    {
        $this->nome   = $nome;
        $this->email  = $email;
        $this->senha  = $senha;
        $this->nivel  = $nivel;
        $this->classe = $classe;
        $this->id     = $id;
    }

    public function getId()     { return $this->id; }
    public function getNome()   { return $this->nome; }
    public function getEmail()  { return $this->email; }
    public function getSenha()  { return $this->senha; }
    public function getNivel()  { return $this->nivel; }
    public function getClasse() { return $this->classe; }
}

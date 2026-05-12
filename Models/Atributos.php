<?php

class Atributos
{
    private $id;
    private $idUsuario;
    private $forca;
    private $velocidade;
    private $inteligencia;
    private $resistencia;
    private $mana;
    private $pontuacaoTotal;
    private $rankHunter;

    public function __construct($idUsuario, $forca, $velocidade, $inteligencia,
                                $resistencia, $mana, $pontuacaoTotal, $rankHunter, $id = null)
    {
        $this->idUsuario      = $idUsuario;
        $this->forca          = $forca;
        $this->velocidade     = $velocidade;
        $this->inteligencia   = $inteligencia;
        $this->resistencia    = $resistencia;
        $this->mana           = $mana;
        $this->pontuacaoTotal = $pontuacaoTotal;
        $this->rankHunter     = $rankHunter;
        $this->id             = $id;
    }

    public function getId()             { return $this->id; }
    public function getIdUsuario()      { return $this->idUsuario; }
    public function getForca()          { return $this->forca; }
    public function getVelocidade()     { return $this->velocidade; }
    public function getInteligencia()   { return $this->inteligencia; }
    public function getResistencia()    { return $this->resistencia; }
    public function getMana()           { return $this->mana; }
    public function getPontuacaoTotal() { return $this->pontuacaoTotal; }
    public function getRankHunter()     { return $this->rankHunter; }
}

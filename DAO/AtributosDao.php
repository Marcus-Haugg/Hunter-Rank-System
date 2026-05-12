<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../Models/Atributos.php';

class AtributosDao
{
    private $tabela    = 'atributos';
    private $connection;

    public function __construct()
    {
        $db               = new Database();
        $this->connection = $db->connection;
    }

    public function salvar(Atributos $atributos)
    {
        $sql  = "INSERT INTO $this->tabela
                    (id_usuario, forca, velocidade, inteligencia,
                     resistencia, mana, pontuacao_total, rank_hunter)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute([
            $atributos->getIdUsuario(),
            $atributos->getForca(),
            $atributos->getVelocidade(),
            $atributos->getInteligencia(),
            $atributos->getResistencia(),
            $atributos->getMana(),
            $atributos->getPontuacaoTotal(),
            $atributos->getRankHunter()
        ]);
    }

    public function listar()
    {
        $sql  = "SELECT * FROM $this->tabela ORDER BY id";
        $stmt = $this->connection->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lista = [];

        foreach ($rows as $row) {
            $lista[] = new Atributos(
                $row['id_usuario'],
                $row['forca'],
                $row['velocidade'],
                $row['inteligencia'],
                $row['resistencia'],
                $row['mana'],
                $row['pontuacao_total'],
                $row['rank_hunter'],
                $row['id']
            );
        }

        return $lista;
    }

    public function buscarPorUsuario($idUsuario)
    {
        $sql  = "SELECT * FROM $this->tabela WHERE id_usuario = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$idUsuario]);
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new Atributos(
            $row['id_usuario'],
            $row['forca'],
            $row['velocidade'],
            $row['inteligencia'],
            $row['resistencia'],
            $row['mana'],
            $row['pontuacao_total'],
            $row['rank_hunter'],
            $row['id']
        );
    }
}

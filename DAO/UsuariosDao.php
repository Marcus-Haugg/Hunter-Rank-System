<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../Models/Usuario.php';

class UsuariosDao
{
    private $tabela    = 'usuarios';
    private $connection;

    public function __construct()
    {
        $db               = new Database();
        $this->connection = $db->connection;
    }

    public function salvar(Usuario $usuario)
    {
        $sql  = "INSERT INTO $this->tabela (nome, email, senha, nivel, classe) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute([
            $usuario->getNome(),
            $usuario->getEmail(),
            $usuario->getSenha(),
            $usuario->getNivel(),
            $usuario->getClasse()
        ]);
    }

    public function listar()
    {
        $sql  = "SELECT * FROM $this->tabela ORDER BY id";
        $stmt = $this->connection->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $usuarios = [];

        foreach ($rows as $row) {
            $usuarios[] = new Usuario(
                $row['nome'],
                $row['email'],
                $row['senha'],
                $row['nivel'],
                $row['classe'],
                $row['id']
            );
        }

        return $usuarios;
    }

    public function buscarPorId($id)
    {
        $sql  = "SELECT * FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new Usuario(
            $row['nome'],
            $row['email'],
            $row['senha'],
            $row['nivel'],
            $row['classe'],
            $row['id']
        );
    }
}
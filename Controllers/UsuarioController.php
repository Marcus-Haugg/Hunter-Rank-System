<?php

require_once __DIR__ . '/../DAO/UsuariosDao.php';

class UsuarioController
{
    public function listar()
    {
        $dao = new UsuariosDao();
        return $dao->listar();
    }

    public function salvar()
    {
        $usuario = new Usuario(
            $_POST['nome'],
            $_POST['email'],
            $_POST['senha'],
            $_POST['nivel'],
            $_POST['classe']
        );

        $dao = new UsuariosDao();
        $dao->salvar($usuario);

        header("Location: lista.php");
    }
}

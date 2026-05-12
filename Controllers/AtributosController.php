<?php

require_once __DIR__ . '/../DAO/AtributosDao.php';

class AtributosController
{
    public function listar()
    {
        $dao = new AtributosDao();
        return $dao->listar();
    }

    public function salvar()
    {
        $atributos = new Atributos(
            $_POST['id_usuario'],
            $_POST['forca'],
            $_POST['velocidade'],
            $_POST['inteligencia'],
            $_POST['resistencia'],
            $_POST['mana'],
            $_POST['pontuacao_total'],
            $_POST['rank_hunter']
        );

        $dao = new AtributosDao();
        $dao->salvar($atributos);

        header("Location: lista.php");
    }

    public function buscarPorUsuario($idUsuario)
    {
        $dao = new AtributosDao();
        return $dao->buscarPorUsuario($idUsuario);
    }
}

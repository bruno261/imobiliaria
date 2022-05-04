<?php

require_once '../model/Imovel.php';

class ImovelController{
    public static function salvar(){
        $imovel = new Imovel();
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setFoto($_POST['foto']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);

        $imovel->save();
    }

    public static function listar(){
        $imovel = new Imovel();
        return $imovel->listAll();
    }
}

?>
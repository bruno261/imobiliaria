<?php
    require_once '../model/Imovel.php';

    /**
    * Controller que provê endpoints relacionados a entidade de imóvel.
    */ 
    class ImovelController
    {
        /**
        * Persiste um novo imóvel no repositório.
        */ 
        public static function salvar()
        {
            $imovel = new Imovel();
            $imovel->setDescricao($_POST['descricao']);
            $imovel->setFoto($_POST['foto']);
            $imovel->setValor($_POST['valor']);
            $imovel->setTipo($_POST['tipo']);

            $imovel->save();
        }

        /**
        * Lista todos os imóveis cadastrados no repositório.
        */ 
        public static function listar()
        {
            $imovel = new Imovel();
            return $imovel->listAll();
        }
    }
?>
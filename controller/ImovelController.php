<?php
    require_once 'model/Imovel.php';
    /**
    * Controller que provê endpoints relacionados a entidade imóvel.
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
        
        /**
        * Edita um imóvel cadastrado com base em seu código de identificação.
        * @id  Código de identificação do imóvel.
        */
        public static function editar($id)
        {
            $imovel = new Imovel;
            $imovel = $imovel->find($id);

            return $imovel;
        }

        /**
        * Exclui um imóvel cadastrado com base em seu código de identificação.
        * @id  Código de identificação do imóvel.
        */
        public static function excluir($id)
        {
            $imovel = new Imovel;
            $imovel = $imovel->remove($id);
        }
    }
?>


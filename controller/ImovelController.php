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
        public static function salvar($fotoAtual="",$fotoTipo="")
        {
            //cria um objeto do tipo Usuario
            $imovel = new Imovel();
            //trata a foto para ser armazenada no banco de dados 
            $imagem = array();
            if(is_uploaded_file($_FILES['foto']['tmp_name'])) {
                $imagem['data'] =file_get_contents($_FILES['FOTO']['tmp_name']);
                $imagem['tipo'] = $_FILES['foto']['type'];

                $path = 'imagens/'.$_FILES['foto']['name'];
                $imagem['tipo'] = $path;
                //upload do arquivo para o servidor 
                move_uploaded_file($_FILES['foto']['tmp_name'], $path);
            }
            //verifica se o array imagem não está vazio, se tiver alguma imagem no mesmo
            //quer dizer que o usuário alterou a imagem ou está cadastrando um imovel novo
            if(!empty($imagem)){
                $imovel->setFoto($imagem['data']);
                //$imovel->setFotoTipo($imagem['tipo']);
                //$imovel->setPath($imagem['path']);
                //verifica se existe um path da imagem e se sim remove a mesma do servidor 
                if(!empty($_POST['path']))
                    unlink($_POST['path']);
            }else{
               
            //armazena as informações do $_POST via set
            $imovel->setid($_POST['id']);
            $imovel->setDescricao($_POST['descricao']);
            $imovel->setValor($_POST['valor']);
            $imovel->setTipo($_POST['tipo']);
            //chama o método save para gravar as informações no bsnco de dados
            $imovel->save();
        }
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


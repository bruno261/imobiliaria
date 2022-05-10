<?php

    require_once 'Banco.php';
    require_once '../Conexao.php';

    class Imovel extends Banco
    {
        private $id;
        private $descricao;
        private $foto;
        private $valor;
        private $tipo;

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getDescricao()
        {
            return $this->descricao;
        }

        public function setDescricao($descricao)
        {
            $this->descricao = $descricao;
        }

        public function getFoto()
        {
            return $this->foto;
        }

        public function setFoto($foto)
        {
            $this->foto = $foto;
        }

        public function getValor()
        {
            return $this->valor;
        }

        public function setValor($valor)
        {
            $this->valor = $valor;
        }

        public function getTipo()
        {
            return $this->tipo;
        }

        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
        }

        /**
        * Cadastra um imóvel na bases de dados.
        */ 
        public function save(){
            $result = false;
            $conexao = new Conexao();

            $sql = "insert into imovel values (null, :descricao, :foto, :valor, :tipo)";
            if($conn = $conexao->getConection())
            {
                $stmt = $conn->prepare($sql);
                if($stmt->execute(array(':descricao'=> $this->descricao, 
                                        ':foto'=> $this->foto, 
                                        ':valor'=> $this->valor,
                                        ':tipo'=> $this->tipo
                                        )))
                                        {
                                            $result = $stmt->rowCount();
                                        }
            }
            return $result;
        }

        /**
        * Remove um imóvel na bases de dados baseado no Id.
        * @id  Código de identificação do imóvel.
        */ 
        public function remove($id){

        }

        /**
        * Busca um imóvel na bases de dados baseado no Id.
        * @id  Código de identificação do imóvel.
        */ 
        public function find($id){

        }

        public function count(){

        }

        /**
        * Lista todos os imóveis cadastrados na bases de dados.
        */ 
        public function listAll()
        {
            // Cria um objeto do tipo conexão.
            $conexao = new Conexao();
            // Cria a conexão com o banco de dados.
            $conn = $conexao->getConection();
            // Cria query de seleção.
            $query = "SELECT * FROM imovel";
            // Prepara a query para execução.
            $stmt = $conn->prepare($query);
            // Cria um array para receber o resultado da seleção.
            $result = array();
            // Executa a query.
            if ($stmt->execute()) {
                // O resultado da busca será retornado como um objeto da classe
                while ($rs = $stmt->fetchObject(Imovel::class))
                    // Armazena esse objeto em uma posição do vetor.
                    $result[] = $rs;
            }
            else
                $result = false;
            
            return $result;
        }
    }
?>
<?php
    require_once 'Banco.php';
    require_once '../Conexao.php';

    /**
    * Objeto de valor que representa um usuário.
    */ 
    class Usuario extends Banco
    {
        private $id;
        private $login;
        private $senha;
        private $permissao;

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getLogin()
        {
            return $this->login;
        }

        public function setLogin($login)
        {
            $this->login = $login;

        }
        public function getSenha()
        {
            return $this->senha;
        }

        public function setSenha($senha)
        {
            $this->senha = $senha;
        }

        public function getPermissao()
        {
            return $this->permissao;
        }

        public function setPermissao($permissao)
        {
            $this->permissao = $permissao;
        }

        /**
        * Cadastra os usuários na base de dados se não existir e edita se existir.
        */ 
        public function save()
        {
            $result = false;

            $conexao = new Conexao();
            if($conn = $conexao->getConection())
            {
                if($this->id > 0)
                {
                    $query = "UPDATE usuario SET login = :login, senha = :senha, permissao = :permissao WHERE id = :id";
                    $stmt = $conn->prepare($query);
                    if($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao' => $this->permissao, ':id' => $this->id)))
                        $result = $stmt->rowCount();
                }
                else
                {
                    $query = "INSERT INTO usuario (id, login , senha, permissao) values (null,:login,:senha,:permissao)";
                    $stmt = $conn->prepare($query);
                    if($stmt->execute(array(':login'=>$this->login, ':senha' =>$this->senha, ':permissao'=>$this->permissao)))
                        $result = $stmt->rowCount();
                }
            }
            return $result;
        }

        /**
        * Remove os usuários cadastrados na base de dados com base no código de identificação.
        */ 
        public function remove($id)
        {
            $result = false;
            $conexao = new Conexao();
            $conn = $conexao->getConection();
            $query = "DELETE FROM usuario WHERE id = :id";
            $stmt =  $conn->prepare($query);
            if($stmt->execute(array(':id'=> $id)))
                $result = true;
            
            return $result;
        }

        /**
        * Busca usuários cadastrados na base de dados com base no códido de identificação.
        */ 
        public function find($id)
        {
            $conexao = new Conexao();
            $conn = $conexao->getConection();
            $query = "SELECT * FROM usuario WHERE id = :id";
            $stmt = $conn->prepare($query);
            if($stmt->execute(array(':id'=>$id)))
            {
                if($stmt->rowCount() > 0)
                    $result = $stmt->fetchObject(Usuario::class);
                else
                $result = false;
            }
            return $result;
        }

        /**
        * Quantifica os usuários cadastrados na base de dados.
        */ 
        public function count()
        {
            // Falta implementar.
        }

        /**
        * Lista todos os usuários cadastrados na base de dados.
        */ 
        public function listAll()
        {
            // Cria um objeto do tipo conexão.
            $conexao = new Conexao();
            // Cria a conexao com o banco de dados.
            $conn = $conexao->getConection();
            // Cria query de seleção.
            $query = "SELECT * FROM usuario";
            // Prepara a query para execução.
            $stmt = $conn->prepare($query);
            // Cria um array para receber o resultado da seleção.
            $result = array();
            // Executa a query.
            if ($stmt->execute()) 
            {
                // O resultado da busca será retornado como um objeto da classe.
                while ($rs = $stmt->fetchObject(Usuario::class))
                    // Armazena esse objeto em uma posição do vetor.
                    $result[] = $rs;
            }
            else
                $result = false;
            
            return $result;
        }
    }
?>
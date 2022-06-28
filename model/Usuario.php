<?php
    require_once 'Banco.php';
    require_once './Conexao.php';

    /**
    * Objeto de valor que representa um usuário.
    */ 
    class Usuario extends Banco
    {
        private $id;
        private $login;
        private $senha;
        private $permissao;

        // Usamos get para obter informações. Esse tipo de método sempre retorna um valor.
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
            return $this->Login;
        }
        public function setLogin($login){
            $this->login = $login;
        }

        public function getSenha()
        {
            return $this->senha;
        }

        public function getPermissao()
        {
            return $this->permissao;
        }
        
        public function setPermissao($permissao){ 
            $this->permissao = $permissao;
        }
        
        /**
        * Definir valores da senhas criptografadas com SHA1.
        */ 
        public function setSenha($senha)
        {
            $this->senha = $senha; //sha1($senha);
        }

        /**
        * Cadastra os usuários na base de dados se não existir e edita se existir.
        */ 
        public function save()
        {
            $result = false;
        //cria um objeto do tipo conexão
            $conexao = new Conexao(); 
        //cria a conexão com o banco de dados
        if($conn = $conexao->getConection())
        { 
            if($this->id > 0){
            //cria query de update passando os atributos que serão atualizados
            $query = "UPDATE usuario SET login = :login, senha = :senha, permissao = :permisao WHERE id = :id";

            //cria query de inserção passando os atributos que serão armazenados
            $query = "insert into usuario (id, login, senha, permissao) values (null, :login, :senha, permissao)";
        
                //prepara a query para execução 
                $stmt = $conn->prepare($query);
                //execute a query
                if ($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao' => $this->permissao, ':id'=> $this->id))){
                    $result = $stmt->rowCount();
                }
            }
            else
            {
                //cria query de inserção passando os atributos que serão armazenados
                $query = "INSERT INTO usuario (id, login , senha, permissao) values (null, :login, :senha, :permissao)";
                //prepara a query para execução
                $stmt = $conn->prepare($query);
                //executa a query
                if($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao' =>$this-> permissao)))
                    $result = $stmt->rowCount();
            }
        }
        return $result;
        }

    
        /**
        * Busca usuários cadastrados na base de dados com base no códido de identificação.
        */ 
        public function find($id)
        {
            //cria um objeto do tipo conexão
            $conexao = new Conexao();
            //cria a conexão com o banco de dados 
            $conn = $conexao->getConection();
            //cria query de seleção
            $query = "SELECT * FROM usuario WHERE id = :id";
            //prepara a query para execução
            $stmt = $conn->prepare($query);
            //executa a query
            if($stmt->execute(array(':id'=> $id)))
            {
                //verifica se houve algum registro encontrado
                if ($stmt->rowCount() > 0) {
                //o resultado da busca será retornado como um objeto de classe 
                    $result = $stmt->fetchObject(Usuario::class);
            
            }else{
                $result = false;
               }
            }
            return $result;
        }

            // hatreto aloha mila verifier ny ambany rehetra sao voadika indroa 


        /**
        * Remove os usuários cadastrados na base de dados com base no código de identificação.
        */ 
        public function remove($id)
        {
            $result = false;
            //cria um objeto do tipo conexao
            $conexao = new Conexao();
            //cria a conexao com o banco de dados 
            $conn = $conexao->getConection();
            //cria query de remoção
            $query = "DELETE FROM usuario WHERE id = :id";
            //prepara a query para execução
            $stmt =  $conn->prepare($query);
            //executa a query
            if($stmt->execute(array(':id'=> $id))){
                $result = true;
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
            $result = false;

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
            return $result;
        }

        /**
        * Realização o loguin de usuários cadastrados na base de dados.
        */ 
        public function logar()
        {
            $result = false;

            // Cria um objeto do tipo conexão
            $conexao = new Conexao();
            // Cria a conexao com o banco de dados
            $conn = $conexao->getConection();
            // Cria query de seleção do usuario
            $query = "SELECT * FROM usuario WHERE login = :login and senha = :senha";
            // Prepara a query para execução.
            $stmt = $conn->prepare($query);
            // Cria um array para receber o resultado da seleção
            $result = array();
            // Executa a query
            if ($stmt->execute(array(':login'=> $this->login, ':senha'=> $this->senha))) 
            {
                //verifica se houve algum registro encotrado
                if($stmt->rowCount() > 0) {
                    $result = true;
                }
                else{
                    $result = false;
                }
            } 
        return $result;
    }
}
?>
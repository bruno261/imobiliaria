public function setSenha($senha)
    {
        $this->senha = md5($senha);
    }

    public function logar()
    {
        // Cria um objeto do tipo conexão.
        $conexao = new Conexao(); 

        // Cria a conexão com o banco de dados.
        $conn = $conexao->getConection();

        // Cria a query de seleção de um usuário com base no login e senha.
        $query = "SELECT * FROM usuario WHERE login = :login and senha = :senha";

        // Prepara a query para a execução.
        $stmt = $conn->prepare($query);

        // Executa a query.
        if($stmt->execute(array(':login'=> $this->login, ':senha'=> $this->senha)))
        {
            // Verifica se há algum registro.
            if($stmt->rowCount() > 0)
                $result = true;
            else
                $result = false;
        }
        return $result;
    }


    public function remove($id){
        $result = false;
        //cria um objeto do tipo conexao
        $conexao = new Conexao();
        //cria a conexao com o banco de dados
        $conn = $conexao->getConection();
        //cria query de remocao
        $query = "DELETE FROM imovel WHERE id = :id";
        //prepara a query para execuxao
        $stmt =  $conn->prepare($query);
        //executa a query
        if($stmt->execute(array(':id'=> $id))){
            $result = true;
        }
        return $result;
    }

   
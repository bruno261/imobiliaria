<?php

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

?>
<?php
    class Conexao
    {
        private $servername = "localhost:3306";
        private $username = "user";
        private $password = "123456";
        private $database = "imobiliaria";
        private $connection;

        public function getConnection()
        {
            if(is_null($this->connection))
            {
                // ServerName - Endereço do banco de dados.
                // UserName - Usuário que está acessando o banco de dados.
                // Password - Senha de acesso ao banco de dados.
                $this->connection = new PDO('mysql:host='.$this->servername.'; dbname='.$this->database, $this->username, $this->password);
                $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $this->connection->exec('set names utf8');     
            }
            return $this->connection;
        }
    }
?>
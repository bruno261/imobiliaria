<?php

require_once 'Banco.php';
require_once '../Conexao.php';
    
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

        public function getLogin()
        {
            return $this->login;
        }
        
        public function getSenha()
        {
            return $this->senha;
        }

        public function getPermissao()
        {
            return $this->permissao;
        }
        // Usamos set para definir valores. Esse tipo de método geralmente não retorna valores.
        public function setId($id)
        {
            $this->id = $id;
        }

        public function setLogin($login)
        {
            $this->login = $login;
        }
        
        public function setSenha($senha)
        {
            $this->$senha = $senha;
        }

        public function setPermissao($permissao)
        {
            $this->permissao = $permissao;
        }
        
        // Funções da super classe.
        public function save()
        {
            // Implementar depois.
        }

        public function remove($id)
        {
            // Implementar depois.
        }

        public function find($id)
        {
            // Implementar depois.
        }

        public function count()
        {
            // Implementar depois.
        }

        public function listAll()
        {
            // Implementar depois.
        }
    }
?>
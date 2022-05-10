<?php
    require_once '../model/Usuario.php';

    /**
    * Controller que provê endpoints relacionados a entidade de usuário.
    */ 
    class UsuarioController
    {
        /**
        * Persiste um novo usuário no repositório.
        */ 
        public static function salvar()
        {
            $usuario = new Usuario();
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha1']);
            $usuario->setPermissao($_POST['permissao']);

            $usuario->save();
        }

        /**
        * Lista todos os usuários cadastrados no repositório.
        */ 
        public static function listar()
        {
            $usuario = new Usuario();
            return $usuario->listAll();
        }
    }
?>
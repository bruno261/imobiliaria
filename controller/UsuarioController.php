<?php
    class UsuarioController
    {
        /* 
        Logar com um usuário no sistema.
        */
        public function logar()
        {

            $usuario = new Usuario();
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha']);

            return $usuario->logar();
        }
    }
?>
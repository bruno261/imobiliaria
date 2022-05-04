<?php

require_once '../model/Usuario.php';

class UsuarioController{
    public static function salvar(){
        $usuario = new Usuario();
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha1']);
        $usuario->setPermissao($_POST['permissao']);

        $usuario->save();
    }

    public static function listar(){
        $usuario = new Usuario();
        return $usuario->listAll();
    }

}

?>
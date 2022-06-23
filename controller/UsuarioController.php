<?php
    require_once './model/Usuario.php';
    /**
    * Controller que provê endpoints relacionados a entidade usuário.
    */ 
    class UsuarioController
    {
        /**
        * Persiste um novo usuário no repositório.
        */ 
        /**
        * Salvar o usuario submetido pelo formulário
        */
        public static function salvar()
        {
            //cria um objeto do tipo usuario
            $usuario = new Usuario();
            //armazena as informações do $_POST via set
            $usuario ->setId($_POST["id"]);
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha1']);
            $usuario->setPermissao($_POST['permissao']);
            //chama o método save para gravar as informações no banco de dados
            $usuario->save();
        }

        /**
        * Lista todos os usuários cadastrados no repositório.
        */ 
        public static function listar()
        {
            //cria um objeto do tipo Usuario
            $usuario = new Usuario();
            //chama o método listAll()
            return $usuario->listAll();
        }

        /**
        * Edita um usuário cadastrado com base em seu código de identificação.
        * @id  Código de identificação do usuário. Mostrar formulário para editar um usuario
        */
        public static function editar($id)
        {
            //cria um objeto do tipo  Usuario
            $usuario = new Usuario;
            $usuario = $usuario->find($id);
            return $usuario;
        }

        /**
        * Exclui um usuário cadastrado com base em seu código de identificação.
        * @id  Código de identificação do usuário. Apagar um usuario conforme o id informado
        */
        public static function excluir($id)
        {
            //cria um objeto do tipo usuario
            $usuario = new Usuario();
            $usuario = $usuario->remove($id);
        }

        /**
        * Logar com um usuário no sistema
        */
        public static function logar()
        {
            $usuario = new Usuario();
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha']);

            return $usuario->logar();
        }
    }
    ?>


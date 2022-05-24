<?php
    require_once './controller/UsuarioController.php';
    require_once './controller/ImovelController.php';

    if(isset($_SESSION['logado']) && $_SESSION['logado'] == true)
    {
        require_once 'view/menu.php';
        if(isset($_GET['action']))
        {
            // Editar.
            if($_GET['action'] == 'editar')
            {
                // Chama uma função PHP que permite informar a classe e o Método que será acionado.
                $usuario = call_user_func(array('UsuarioController', 'editar'), $_GET['id']);
                require_once 'view/cadUsuario.php';
            }
            
            // Listar.
            if($_GET['action'] == 'listar')
                require_once 'view/listUsuario.php';

            // Excluir
                if($_GET['action'] == 'excluir')
            {
                // Chama uma função PHP que permite informar a classe e o Método que será acionado.
                $usuario = call_user_func(array('UsuarioController', 'excluir'), $_GET['id']);
                require_once 'view/listUsuario.php';
            }    
        }
        else
            require_once 'view/cadUsuario.php';
    }
?>

<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title> Tela de Cadastro de Usuários e Imóveis.</title>
    </head>
    <body>
        <h1>Cadastro de usuários E imóveis.</h1>
        <link rel="stylesheet" href="https://bootswatch.com/3/darkly/bootstrap.css">
        <a href="index.php?page=imovel">Imóvel.</a><br>
        <a href="index.php?page=usuario">Usuário.</a><br>

        <?php
            if(isset($_GET["action"]) && (isset($_GET["page"])) && $_GET["page"] == "usuario")
            {
                if($_GET["action"] == "editar")
                {
                    $usuario = call_user_func(array("UsuarioController","editar"), $_GET["id"]);
                    require_once 'view/cadUsuario.php';
                }
                if($_GET["action"] == "listar")
                    require_once 'view/listUsuario.php';
                
                if($_GET["action"] == "excluir")
                {
                    $usuario = call_user_func(array("UsuarioController","excluir"), $_GET["id"]);
                    require_once 'view/listUsuario.php';
                }
            }
            elseif((isset($_GET["page"])) && $_GET["page"] == "usuario")
                require_once 'view/cadUsuario.php';
        ?>

        <?php
            if(isset($_GET["action"]) && (isset($_GET["page"])) && $_GET["page"] == "imovel")
            {
                if($_GET["action"] == "editar")
                {
                    $imovel = call_user_func(array("ImovelController","editar"), $_GET["id"]);
                    require_once 'view/cadImovel.php';
                }
                if($_GET["action"]  == "listar")
                    require_once 'view/listImovel.php';
                
                if($_GET["action"] == "excluir")
                {
                    $imovel = call_user_func(array("ImovelController","excluir"), $_GET["id"]);
                    require_once 'view/listImovel.php';
                }
            }
            elseif((isset($_GET["page"])) && $_GET["page"] == "imovel")
                require_once 'view/cadImovel.php';
        ?>
    </body>
</html>
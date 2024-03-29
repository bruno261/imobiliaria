<?php
    //require_once '../head.php';
?>
<div class="container">
    <h1>Lista de Usuários</h1>
    <hr>
    <div> 
        <table style="top:40px;">
        <thead> 
            <tr> 
                <th>Login</th>
                <th>Permissão</th>
                <th><a href="cadUsuario">Novo</a></th>
            </tr> 
        </thead> 
        <table class="table table-bordered table-striped" style="top:40px;"> 
        <tbody>
            <?php
                // Importa o Usuário Controller.
                require_once '../controller/UsuarioController.php';
                // Chama uma função PHP que permite informar a classe e o Método que será acionado.
                $usuarios = call_user_func(array('UsuarioController','listar'));

                // Verifica se houve algum retorno.
    if (isset($usuarios) && !empty($usuarios)) 
                foreach ($usuarios as $usuario) {
            ?>
            <tr>
                <!-- Como o retorno é um objeto, devemos chamar os get para mostrar o resultado -->
                <td><?php echo $usuario->getLogin(); ?></td>
                <td><?php echo ($usuario->getPermissao() == 'C')?'Comum':'Administrador';?></td>
                <td>
                    <a href="index.php?action=editar&id=<?php echo $usuario->getId();?>">
                    class="btnb tn-primary btn-sm">Editar</a>

                    <a href="index.php?action=excluir&id=<?php echo $usuario->getId();?>">class="btn btn-danger btn-sm">Excluir</a>

                </td>
             </tr>
            <?php
        
    } else {
                ?>
                <tr>
                <td colspan="3">Nenhum registro encontrado</td>
            </tr>
            <?php
            }
        
            ?>
        </tbody>
    </=>
</div>

<?php
   // require_once '../foot.php';
?>
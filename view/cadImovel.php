<?php
    //require_once '../head.php';
?>
<div class="container">
    <form name="cadImovel" id="cadImovel" action="" method="post" enctype="multipart/form-data">
        <div class="card" style="top:40px">
            <div class="card-header">
                <span class="card-title">Cadastro de Imóveis.</span>
            </div>
            <div class="card-body">
            </div>
                <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Descrição:</label>
                <input type="text" class="form-control col-sm-8" name="descricao" id="descricao" value="" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Foto:</label>
                <input type="text" class="form-control col-sm-8" name="foto" id="foto" value="" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Valor:</label>
                <input type="text" class="form-control col-sm-8" name="valor" id="valor" value="" />
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Foto:</label>>
                <input type="file" class="form-control col-sm-8" name="foto" id="foto"/>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Tipo:</label>
                <select name="tipo" id="tipo" class="form-control col-sm-8">
                    <option value="0">**SELECIONE**</option>
                    <option value="C">Casa Térrea</option>
                    <option value="S">Sobrado</option>
                    <option value="T">Terreno</option>
                    <option value="H">Chacara</option>
                </select>
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" id="id" value="" />
                <input type="submit" class="btn btn-success" name="btnSalvar" id="btnSalvar">
            <?php
                 if(isset($imovel) && !empty($imovel->getFoto())){
            ?>
            <div class="form-group form-row"> 
                <div class="text-center"> 
                    <img Class="img=thumbnail" style="width: 25%;"
                    src="<?php echo $imovel->getPath();?>">;base64,<?php echo base64_encode($imovel->getFoto());?>">
                 </div>
            </div>

            <?php
                 }
            ?>
            </div>
        </div>
    </form>
</div>

<?php
    //verifica se o botão foi acionado
    if(isset($_POST['btnSalvar']))
    {
        //chama uma função php que permite informar a classe e o métode que será acionado
        if(isset($imovel)){
            call_user_func(array('imovelController','salvar'),$imovel->getFoto(),$imovel->getFotoTipo());
        }else{
            call_user_func(array('imovelController','salvar'));
        }
        header('Location: index.php?action=listar&page=Imovel');

        }
        echo 'Salvo!';
        require_once '../controller/ImovelController.php';
        call_user_func(array('ImovelController','salvar'));
    
    //require_once '../foot.php';
?>
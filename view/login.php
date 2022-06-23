<?php

// Verifica se o botão Submit foi acionado.
if(isset($_POST['btnLogar']))
{
    // Chama uma função PHP que permite informar classe e o Método que será acionado.
    $_SESSION['logado'] = call_user_func(array('UsuariController', 'logar'));
    // Armazena o usuário na SESSION.
    $_SESSION['login'] = $_POST['login'];
    // Redireciona para a index.
    header('Location: index.php');
}

//gera PDF.php
require_once '../../vender/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('../css/style.css');
$html = '<h1>Minha primeira página PDF</h1>';

$mpdf->setProtection(array('copy','print'),'123456','654321');
$mpdf->writeHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHTML($html,\Mpdf \HTMLParserMode::HTML_BODY);
$mpdf->output();
$mpdf->AddPage('L');
$mpdf->AddPage('P');
$mpdf->SetHeader(<div style="text-align: right; font-weiht: bold;">
        My document
</div>);
$mpdf->setFooter('Document Title/Center Text/{PAGENO}');
?>

<div class="container">  
style.css
h1{
    color: blue;
}      
        <form name="cadLogin" id="cadLogin" action="" method="post">;

        <style class="css">
                h1{
            color:blue;
        }
        </style>

        <div class="card" style="top:40px; width: 50%;">
            <div class="card-header">
                <span class="card-title">Login</span>
            </div>
            <div class="card-body"></div>
            </div>
            <div class="form-group form-row">
                <label class="col-sm-2 col-form-label text-right">Usuário:</label>
                <input type="text" class="form-control col-sm-8" name="senha" id="senha" value="">
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn sucess" name="btnLogar" id="btnLogar" value="Logar">
            </div>
        </div>
    </form>
</div>

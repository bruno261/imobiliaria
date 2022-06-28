<?php
    session_start();
    require_once 'head.php';

// Verifica se o botão Submit foi acionado.
if(isset($_POST['btnLogar']))
{
    //importa o usuarioContoroller.php
    require_once 'controller/UsuarioController.php';
    // Chama uma função PHP que permite informar classe e o Método que será acionado.
    $_SESSION['logado'] = call_user_func(array('UsuarioController', 'logar'));
    // Armazena o usuário na SESSION.
    $_SESSION['login'] = $_POST['login'];
    // Redireciona para a index.
    header('Location: index.php');
}
/*
//gera PDF.php
require_once '../../vender/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$stylesheet = file_get_contents('../css/style.css');
$html = '<h1>Minha primeira página PDF</h1>';

$mpdf->setProtection(array('copy','print'),'123456','654321');
$mpdf->writeHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->output();
$mpdf->AddPage('L');
$mpdf->AddPage('P');
$mpdf->SetHeader('<div style="text-align: right; font-weiht: bold;">My document</div>');
$mpdf->setFooter('Document Title/Center Text/{PAGENO}'); */
?>

<section class="contact-us">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 align-self-center">
          <div class="row">
            <div class="col-lg-12">
              <form name="cadLogin" id="cadLogin" action="" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>Faça login</h2>
                  </div>
                  <div class="col-lg-4">
                    <fieldset>
                    <label class="col-sm-3 col-form-label text-right">Usuário:</label>
                    <input type="text" class="form-control col-sm-8" name="login" id="login" value="" placeholder="Digite login/usuário">
                    </fieldset>
                  </div>
                  <br>
                  <div class="col-lg-4">
                    <fieldset>
                    <label class="col-sm-3 col-form-label text-right">Senha:</label>
                      <input type="text" class="form-control col-sm-8" name="senha" id="senha" value placeholder="Digite a senha">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="btnLogar" name="btnLogar" value="logar" class="button">Entrar</button>
                      <input type="submit" class="button" name="btnLogar" id="btnLogar" value="Logar">
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php require_once 'foot.php' ?>

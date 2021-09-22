<?php
// Mensagem de erro
if( !empty($data['mensagem']) ) {
    foreach($data['mensagem'] as $msg) {
        echo $msg;
    }
}
?>

<form id="login" action="" method="POST">
    <img id="logo-cliente" class="w3-margin-top" src="<?php echo URL_BASE;?>/imagens/logo2.png"/>

    <input name="userLogin" class="w3-input w3-border w3-margin-top" type="text" placeholder="Usuário">
    <input name="senha" class="w3-input w3-border w3-margin-top" type="password" placeholder="Senha">
    <button name="btn-login" class="w3-button w3-theme w3-margin-top w3-block">Logar</button>

    <!--<button id="my" class="w3-button w3-theme w3-margin-top w3-block">Teste toastr</button>-->
      
    <a href="http://www.santri.com.br">
        <img id="logo-santri" class="w3-right w3-margin-top" src="<?php echo URL_BASE;?>/imagens/logo_santri.svg"/>
    </a>
</form>
<?php
if (isset($_GET['cliente'])) {
    $html = atualizarCadastroCliente(false);
}
echo $html;
?>
<span id="conteudoAtualizarCadastro"></span>
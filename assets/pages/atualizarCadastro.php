<?php
if (isset($_GET['cliente'])) {
    $html = atualizarCadastroCliente();
}
echo $html;

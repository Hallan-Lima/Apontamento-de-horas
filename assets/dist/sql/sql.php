<?php
include '.env';

if (isset($_POST['validaOpcao'])) {
    $validaOpcao = $_POST['validaOpcao'];
}
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
}
if (isset($_POST['valor'])) {
    $nome = $_POST['valor'];
}
if (isset($_POST['descricao'])) {
    $nome = $_POST['descricao'];
}
switch ($validaOpcao) {
    case 'cadastrarTarefa':
        
        break;
    
    default:
        # code...
        break;
}
function montarQuery($itens, $validaOpcao) {



}

function incluiAnd(){

}

function adicionaBD($query) {

}
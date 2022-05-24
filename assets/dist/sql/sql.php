<?php

if (isset($_POST['validaOpcao'])) {
    $validaOpcao = $_POST['validaOpcao'];
}
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $nomeQuery = " nome='".$nome."' ";
    $nomeQuery = incluiAnd($nomeQuery);
}
if (isset($_POST['valor'])) {
    $valor = $_POST['valor'];
    $valorQuery = " valor='".$valor."' ";
    $valorQuery = incluiAnd($valorQuery);
}
if (isset($_POST['descricao'])) {
    $descricao = $_POST['descricao'];
    $descricaoQuery = " descricao='".$descricao."' ";
    $descricaoQuery = incluiAnd($descricaoQuery);
}
if (isset($_POST['telefone'])) {
    $telefone = $_POST['telefone'];
    $telefoneQuery = " telefone='".$telefone."' ";
    $telefoneQuery = incluiAnd($telefoneQuery);
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $emailQuery = " email='".$email."' ";
    $emailQuery = incluiAnd($emailQuery);
}
$insertTable = "INSERT INTO ";
$tarefaTabela = 'tarefas';
$clienteTabela = 'cliente';

switch ($validaOpcao) {
    case 'cadastrarTarefa':
        $query = $insertTable.$tarefaTabela." (`nome`,`descricao`,`valor`) 
        VALUES ('".$nome."','".$descricao."','".$valor."') ";
        break;
    case 'cadastrarCliente':
        $query = $insertTable.$clienteTabela." (`nome`,`descricao`,`valor`,`telefone`,`email`) 
        VALUES ('".$nome."','".$descricao."','".$valor."','".$telefone."','".$email."') ";
        break;
    
    default:
        # code...
        break;
}
echo $query;
adicionaBD($query);

function incluiAnd($var){
    $var = $var.' AND ';
    return $var;
}

function adicionaBD($query) {
    include '.env';
    $sql = mysqli_query($conn, $query);
    return $sql;
}
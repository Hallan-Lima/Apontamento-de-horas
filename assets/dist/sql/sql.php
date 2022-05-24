<?php

if (isset($_POST['validaOpcao'])) {
    $validaOpcao = $_POST['validaOpcao'];
}
if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $nomeQuery = " nome='".$nome."' ";
    $nomeQuery = incluiAnd($nomeQuery);
}
if (isset($_POST['valorU'])) {
    if ($_POST['valorU'] != '') {
    $valor = $_POST['valorU'];
    $valorQuery = " valorUnico='".$valor."' ";
    $valorQuery = incluiAnd($valorQuery);
    $opProjetosValor = 'valorUnico';
    } 
}
//comando abaixo deixado como default caso não incluído nenhum valor ou caso seja passado dois parâmetros via form 
if (isset($_POST['valorH'])) {
    if ($_POST['valorH'] != '') {
        $valor = $_POST['valorH'];   
        $valorQuery = " valorHora='".$valor."' ";
        $valorQuery = incluiAnd($valorQuery);
    }
    $opProjetosValor = 'valorHora';
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
if (isset($_POST['cliente'])) {
    $cliente = $_POST['cliente'];
    $clienteQuery = " idCliente='".$cliente."' ";
    $clienteQuery = incluiAnd($clienteQuery);
}
if (isset($_POST['tarefa'])) {
    $tarefa = $_POST['tarefa'];
    $tarefaQuery = " idTarefas='".$tarefa."' ";
    $tarefaQuery = incluiAnd($tarefaQuery);
}

$insertTable = "INSERT INTO ";
$tarefaTabela = 'tarefas';
$clienteTabela = 'cliente';
$projetoTabela = 'projetos';

switch ($validaOpcao) {
    case 'cadastrarTarefa':
        $query = $insertTable.$tarefaTabela." (`nome`,`descricao`,`valor`) 
        VALUES ('".$nome."','".$descricao."','".$valor."') ";
        break;
    case 'cadastrarCliente':
        $query = $insertTable.$clienteTabela." (`nome`,`descricao`,`valor`,`telefone`,`email`) 
        VALUES ('".$nome."','".$descricao."','".$valor."','".$telefone."','".$email."') ";
        break;
    case 'cadastrarProjeto':
        $query = $insertTable.$projetoTabela." (`nome`,`descricao`,`".$opProjetosValor."`,`idCliente`,`idTarefas`) 
        VALUES ('".$nome."','".$descricao."','".$valor."','".$cliente."','".$tarefa."') ";
        break;
    
    default:
    retornUser('2');
        break;
}
$query = adicionaBD($query);
if ($query) {
    retornUser('1');
}else {
    retornUser('3');
}
function incluiAnd($var){
    $var = $var.' AND ';
    return $var;
}
function adicionaBD($query) {
    include '.env';
    $sql = mysqli_query($conn, $query);
    return $sql;
}
function retornUser($msg) {
//implementar sistema de retorno ao usuario
header('Location: ../../../index.php?inf='.$msg);
die;
}
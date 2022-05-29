<?php

// if (isset($_GET['atualizarRegistros'])) {
//     $result = montarTabela();
//     echo json_encode($result);
// }

if (isset($_POST['validaOpcao'])) {
    $validaOpcao = $_POST['validaOpcao'];
    montarQuery(null);
}
function montarQuery($obj) {
global $validaOpcao;
$insertTable = "INSERT INTO ";
$selectFrom = "SELECT * FROM ";
$tarefaTabela = 'tarefas';
$clienteTabela = 'cliente';
$projetoTabela = 'projetos';
$registroTabela = 'registros';

if ($obj != null) {
    $validaOpcao = $obj;
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
    $clienteQuery = " nome='".$cliente."' ";
    $queryIDCliente = 'SELECT id FROM '.$clienteTabela.' WHERE '.$clienteQuery;
    $queryIDCliente = queryBD($queryIDCliente);
    $queryIDCliente = mysqli_fetch_assoc($queryIDCliente);
    $idCliente = $queryIDCliente['id'];
}
if (isset($_POST['tarefa'])) {
    if ($_POST['tarefa'] != '') {
    $tarefa = $_POST['tarefa'];
    $tarefaQuery = " nome='".$tarefa."' ";
    $queryIDTarefa = 'SELECT id FROM '.$tarefaTabela.' WHERE '.$tarefaQuery;
    $queryIDTarefa = queryBD($queryIDTarefa);
    $queryIDTarefa = mysqli_fetch_assoc($queryIDTarefa);
    $idTarefa = $queryIDTarefa['id'];
    }
}
if (isset($_POST['projeto'])) {
    if ($_POST['projeto'] != '') {
    $projeto = $_POST['projeto'];
    $projetoQuery = " nome='".$projeto."' ";
    $queryIDProjeto = 'SELECT id FROM '.$projetoTabela.' WHERE '.$projetoQuery;
    $queryIDProjeto = queryBD($queryIDProjeto);
    $queryIDProjeto = mysqli_fetch_assoc($queryIDProjeto);
    $idProjeto = $queryIDProjeto['id'];
    }
}
if (isset($_POST['valorHoraInicio'])) {
    if ($_POST['valorHoraInicio'] != '') {
    $valorHoraInicio = $_POST['valorHoraInicio'];
    }
}
if (isset($_POST['valorHoraFim'])) {
    if ($_POST['valorHoraFim'] != '') {
    $valorHoraFim = $_POST['valorHoraFim'];
    }
}
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
        VALUES ('".$nome."','".$descricao."','".$valor."','".$idCliente."','".$idTarefa."') ";
        break;
    case 'registroHoras':
        $query = $insertTable.$registroTabela." (id, descricao, tempoTotal, tempoInicial, tempoFinal, idProjeto, idTarefas)
        VALUES ('DEFAULT', '$descricao', '$valor', '$valorHoraInicio','$valorHoraFim','$idProjeto','$idTarefa')";
        break;
    case 'registroCadastrados':
        $query = $selectFrom.$registroTabela;
        break;
    
    default:
        break;
}

$query = queryBD($query);
if ($query) {
    retornUser('1');
}else {
    retornUser('3');
}

return $query;
}
function incluiAnd($var){
    $var = $var.' AND ';
    return $var;
}
function queryBD($query) {
    include '.env';
    $sql = mysqli_query($conn, $query);
    return $sql;
}
function retornUser($msg) {
//implementar sistema de retorno ao usuario
header('Location: ../../../index.php?inf='.$msg);
die;
}
// function montarTabela() {
//     $result = montarQuery('registroCadastrados');
//     // echo '<tbody>';
//     // while ($value = mysqli_fetch_assoc($result)) {
//     //     echo '<tr>';
//     //     echo '<td>'.$value[3].'</td>';
//     //     echo '<td>'.$value[6].'</td>';
//     //     echo '<td>'.$value[5].'</td>';
//     //     echo '<td> R$ 0,00 </td>';
//     //     echo '<td>'.$value[1].'</td>';
//     //     echo '</tr>';
//     // }
//     // echo '</tbody>';
//     $result = mysqli_fetch_assoc($result);
//     return $result;
// }
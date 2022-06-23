<?php
global $conn;
$hostname="localhost";
$username="root";
$password="";
$dbname="db_apontamentohoras";
	
$conn = new mysqli($hostname, $username, $password, $dbname);

if (!$conn) {
    exit;
}else{
    // banco conectado
}

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
if (is_array($validaOpcao)) {
    $v = $validaOpcao['inf'];
}else {
    $v = $validaOpcao;
}

switch ($v) {
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
    case 'idProjeto':
        $idProjeto = $validaOpcao['id'];
        $query = $selectFrom.$projetoTabela." WHERE id='$idProjeto' ";
        $validaOpcao = false;
        break;
    case 'idCliente':
        $idCliente = $validaOpcao['id'];
        $query = $selectFrom.$clienteTabela." WHERE id='$idCliente' ";
        $validaOpcao = false;
        break;
    case 'nomeCliente':
        $idCliente = $validaOpcao['id'];
        $query = $selectFrom.$clienteTabela." WHERE nome='$idCliente' ";
        $validaOpcao = false;
        break;
    case 'nomeProjeto':
        $idProjeto = $validaOpcao['id'];
        $query = $selectFrom.$projetoTabela." WHERE nome='$idProjeto' ";
        $validaOpcao = false;
        break;
    case 'infClienteCompleto':
        $query = 'SELECT 
            c.*, p.id as projeto_id, p.nome as projeto_nome, p.descricao as projeto_descricao, p.valorHora as projeto_valorHora, p.valorUnico as projeto_valorUnico 
        FROM 
            '.$clienteTabela.' as c
            INNER JOIN '.$projetoTabela.' as p on p.idCliente= c.id
        WHERE
            c.nome="'.$obj['cliente'].'"
        ';
        $validaOpcao = false;
        break;
    
    default:
        break;
}

$query = queryBD($query);
if ($validaOpcao) {
    if ($query) {
        retornUser('1');
    }else {
        retornUser('3');
    }
}
if ($v == 'infClienteCompleto') {
    $query = mysqli_fetch_array($query);
    echo "<script>";
    echo "var mandar = ".print_r($query);
    echo "</script>";
}

return $query;
}
function incluiAnd($var){
    $var = $var.' AND ';
    return $var;
}
function queryBD($query) {
    global $conn;
    $sql = mysqli_query($conn, $query);
    return $sql;
}
function retornUser($msg) {
//implementar sistema de retorno ao usuario
header('Location: ../../../index.php?inf='.$msg);
die;
}
function montarTabela($buscarProjeto,$mes) {
    global $conn;
    $valorTotal = 0;
    if ($buscarProjeto) {
        $query = mysqli_query($conn, "SELECT * FROM registros WHERE idProjeto='$buscarProjeto'");
    } else {
        $query = mysqli_query($conn, "SELECT * FROM registros");
    }
    if (($mes)) {
        $query = mysqli_query($conn, "SELECT * FROM registros WHERE tempoInicial LIKE '%/$mes/%';");
    }
    if (($mes)&&($buscarProjeto)) {       
        $query = mysqli_query($conn, "SELECT * FROM registros WHERE idProjeto='$buscarProjeto' AND tempoInicial LIKE '%/$mes/%';");
    }
    while ($value = mysqli_fetch_assoc($query)) {
        $v1 = $value['tempoInicial']; 
        $v2 = $value['idProjeto']; 
        $v3 = $value['tempoTotal'];
        $v4 = $value['tempoFinal'];
        $result = formatarValores($v1,$v2,$v3,$v4);
        $valorTotal += $result['valor'];
        $result['valor'] = number_format($result['valor'], 2, ',', '.');

        echo '<tr>';
        echo '<td>' . $result['tempoInicial'] . '</td>';
        echo '<td>' . $result['nomeProjeto'] . '</td>';
        echo '<td>' . $result['tempoTotal'] . '</td>';
        echo '<td>' . $result['valor'] . '</td>';
        echo '<td>' . $value['descricao'] . '</td>';
        echo '</tr>';

    }
    $valorTotal = number_format($valorTotal, 2, ',', '.');

    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td>'.$valorTotal.'</td>';
    echo '<td></td>';

    echo '</tbody>';
}
function listaTarefas() {
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM tarefas");
    while ($value =  mysqli_fetch_assoc($query)) {
        echo '<option value="' . $value['nome'] . '">';
    }
}
function listProjeto() {
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM projetos");
    while ($value =  mysqli_fetch_assoc($query)) {
        echo '<option value="' . $value['nome'] . '">';
    }
}
function listClientes() {
    global $conn;
    $html = null;
    $query = mysqli_query($conn, "SELECT * FROM cliente");
    while ($value =  mysqli_fetch_assoc($query)) {
        $html.= '<option value="' . $value['nome'] . '">';
    }
    return $html;
}
function formatarValores($tempoInicial, $idProjeto, $tempoTotal, $tempoFinal) {
    $obj = [ 
        'inf' => 'idProjeto',
        'id' => $idProjeto,
    ];
    $projeto = montarQuery($obj);
    $projeto = mysqli_fetch_assoc($projeto);
    $valorProjeto = ($projeto['valorHora'] != null) ? $projeto['valorHora'] : 0 ;
    if ($valorProjeto == 0) {
        $obj = [ 
            'inf' => 'idCliente',
            'id' => $projeto['idCliente'],
        ];
        $valorProjeto = montarQuery($obj);
        $valorProjeto = mysqli_fetch_array($valorProjeto);
        $valorProjeto = $valorProjeto['valor'];
    }

    $tempoFinal = explode(' ',$tempoFinal);
    $tempoFinal = explode(':',$tempoFinal[1]);
    $tempoInicial = explode(' ',$tempoInicial);
    $sTI = explode(':',$tempoInicial[1]);

    $hTF  = $tempoFinal[0]; 
    $mTF  = $tempoFinal[1]; 
    $sTF  = $tempoFinal[2]; 
    $hTI  = $sTI[0]; 
    $mTI  = $sTI[1]; 
    $sTI  = $sTI[2]; 

    $hTF = $hTF*60*60;
    $mTF = $mTF*60;
    $hTI = $hTI*60*60;
    $mTI = $mTI*60;
    $sTF += $hTF + $mTF;
    $sTI += $hTI + $mTI;

    $s = $sTF-$sTI;

    $valorProjeto   = intval($valorProjeto);
    $valorProjeto = $valorProjeto/60/60;
    
    $valorProjeto   = $s*$valorProjeto;

    $tempoTotal = gmdate("H:i:s", $s);
    
    $result = [
        'tempoInicial'  => $tempoInicial[0],
        'nomeProjeto'   => $projeto['nome'],
        'valor'   => $valorProjeto,
        'tempoTotal'   => $tempoTotal,
    ];
    return $result;
}

/** INICIO
 * ESTRUTURA PARA A PAGINA - relatorio.php
 */

$buscarProjeto=null;
$mes=null;
$idCliente = 'Todos os clientes';
if (isset($_POST['buscarProjeto'])) {
    $buscarProjeto = $_POST['buscarProjeto'];
    $obj = [
        'inf' => 'nomeProjeto',
        'id' => $buscarProjeto,
    ];
    $buscarProjeto = montarQuery($obj);
    $buscarProjeto = mysqli_fetch_assoc($buscarProjeto);
    $idCliente = $buscarProjeto['idCliente'];
    $buscarProjeto = $buscarProjeto['id'];
    $obj = [
        'inf' => 'idCliente',
        'id' => $idCliente,
    ];
    $idCliente = montarQuery($obj);
    $idCliente = mysqli_fetch_assoc($idCliente);
    $idCliente = $idCliente['nome'];
}
if (isset($_GET['m'])) {
    $mes = $_GET['m'];
    if ($mes=='atual') {
        $mes = date('m');
    }
    if ($mes=='anterior') {
        $mes = date('m');
        $mes = $mes-1;
    }
    $mes = $mes*1;
    if ($mes < 9) {
        $mes='0'.$mes;
    }
}else {
    $mes = date('m');
}
/** FIM
 * ESTRUTURA PARA A PAGINA - relatorio.php
 */
<?php
include 'assets/dist/php/sql.php';
include 'assets/dist/php/functions.php';
include 'resources/ps/dadosPessoais.php';


?>
<!doctype html>
<html lang="pt-BR">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Hállan Lima">
<meta name="generator" content="Hugo 0.84.0">
<title> Apontamento de Horas </title>

<link rel="stylesheet" href="assets/dist/css/style.css">

<!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/footers/">

<!-- Custom styles for this template -->
<link href="assets/dist/css/dashboard.css" rel="stylesheet">

<!-- datepickers core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/dist/css/bootstrap-datetimepicker.min.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head> 
<?php

$url = (isset($_GET['url'])) ? $_GET['url']:'index';
if ($url == 'relatorio') {
    $html = navHeader('relatorio');
    echo $html;
    include 'assets/pages/relatorio.php';
}
if ($url == 'index') {
    $html = navHeader('dashboard');
    echo $html;
    include 'assets/pages/home.php';
}
if ($url == 'atualizarCadastro') {
    $html = navHeader('dashboard');
    echo $html;
    include 'assets/pages/atualizarCadastro.php';
}
estruturaFooter();



?>
<!-- Modal -->
    <!-- INICIO - Modal Cliente -->
    <div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="modalCliente" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="fechar"></button>
                </div>
                <form action="assets/dist/php/sql.php" method="post">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col">
                                <input type="text" class="form-control" name="nome" placeholder="Nome" aria-label="nome" required>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="valor" placeholder="R$ por Hora" aria-label="valor por hora" required>
                            </div>
                        </div>
                        <div class="mb-2">
                            <textarea class="form-control" rows="3" name="descricao" placeholder="Descrição"></textarea>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <input type="text" class="form-control" name="telefone" placeholder="Telefone" aria-label="telefone">
                            </div>
                            <div class="col mb-2">
                                <input type="text" class="form-control" name="email" placeholder="Email" aria-label="email">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" id="cadastrarCliente" name="validaOpcao" value="cadastrarCliente" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FIM - Modal Cliente -->
    <!-- INICIO - Modal Projeto -->
    <div class="modal fade" id="modalProjeto" tabindex="-1" aria-labelledby="modalProjeto" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Projeto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="assets/dist/sql/sql.php" method="post">
                    <div class="modal-body">
                        <div class="col mb-2">
                            <input type="text" class="form-control" name="nome" placeholder="Nome do projeto" aria-label="nome do projeto" required>
                        </div>
                        <div class="mb-2">
                            <textarea class="form-control" rows="3" name="descricao" placeholder="Descrição"></textarea>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <input class="form-control" list="listClientes" name="cliente" placeholder="Cliente" required>
                                <datalist id="listClientes">
                                    <?php
                                    listClientes();
                                    ?>
                                </datalist>
                            </div>
                            <div class="col mb-2">
                                <input class="form-control" list="listTarefas" name="tarefa" placeholder="Tarefa">
                                <datalist id="listTarefas">
                                    <?php
                                    listaTarefas();
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <input type="text" class="form-control" name="valorH" placeholder="R$ por Hora" aria-label="valor por hora">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="valorU" placeholder="Valor único" aria-label="valor unico">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" id="cadastrarProjeto" name="validaOpcao" value="cadastrarProjeto" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FIM - Modal Projeto -->
    <!-- INICIO - Modal Tarefas -->
    <div class="modal fade" id="modalTarefa" tabindex="-1" aria-labelledby="modalTarefa" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Tarefa</h5>
                </div>
                <form action="assets/dist/php/sql.php" method="post">
                    <div class="modal-body">
                        <div class="col mb-2">
                            <input type="text" name="nome" class="form-control" id="tarefaNome" placeholder="Nome" aria-label="nome" required>
                        </div>
                        <div class="mb-2">
                            <textarea name="descricao" class="form-control" rows="3" id="tarefaDescricao" placeholder="Descrição"></textarea>
                        </div>
                        <div class="col mb-2">
                            <input type="text" name="valor" class="form-control" id="tarefaValor" placeholder="Valor adicional" aria-label="valor adicional">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" name="validaOpcao" value="cadastrarTarefa" id="cadastrarTarefa"><strong>Cadastrar</strong></button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FIM - Modal Tarefas -->
    <!-- Modal -->

<!-- datepickers core JS -->
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/dist/js/popper.js"></script>
<script src="assets/dist/js/moment-with-locales.min.js"></script>
<script src="assets/dist/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/dist/js/main.js"></script>

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/dashboard.js"></script>

<script language="JavaScript" type="text/javascript" src="assets/dist/js/script.js"></script>

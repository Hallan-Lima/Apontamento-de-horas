<?php
include 'assets/dist/sql/.env';
include 'assets/dist/php/functions.php';

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Hállan Lima">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Registro e apontamento de horas</title>

    <link rel="stylesheet" href="assets/dist/css/style.css">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/dashboard.css" rel="stylesheet">

    <!-- datepickers core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/dist/css/bootstrap-datetimepicker.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Apontamento de horas</a>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                Registros
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Relatório
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Projetos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Tarefas
                            </a>
                        </li>
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Cadastrar</span>
                        <a class="link-secondary">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-target="#modalCliente" data-bs-toggle="modal">
                                <span data-feather="file-text"></span>
                                Cliente
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-target="#modalProjeto" data-bs-toggle="modal">
                                <span data-feather="file-text"></span>
                                Projeto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-target="#modalTarefa" data-bs-toggle="modal">
                                <span data-feather="file-text"></span>
                                Tarefa
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="col mb-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Novo Registro</h1>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="row">
                                <div class="mb-2">
                                    <textarea class="form-control" id="texteareaDescricao" placeholder="O que esta fazendo?" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col datepickers" id="inicioHora">
                                    <div class="form-group">
                                        <div class="input-group date" id="id_1">
                                            <input type="text" id="valorHoraInicio" value="" class="form-control" placeholder="De: MM/DD/YYYY hh:mm:ss" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col datepickers" id="fimHora">
                                    <div class="form-group">
                                        <div class="input-group date" id="id_0">
                                            <input type="text" id="valorHoraFim" value="" class="form-control" placeholder="Até: MM/DD/YYYY hh:mm:ss" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-grid">
                                    <button type="button" name="iniciarRegistroHoras" id="btnRegistroHoras" class="btn btn-outline-success">Começar a trabalhar</button>
                                </div>
                                <div class="col-md-6" id="divInformacao" style="display: none;">
                                    <div class="col">
                                        <div class="p-2 bg-secondary text-white" id="msgProjeto_Tarefa">Secondary</div>
                                    </div>
                                </div>
                                <div class="col-auto" id="divTotalHora">
                                    <input type="text" class="text-center form-control" id="totalHora" placeholder="00:00:00" />
                                </div>
                                <div class="col-auto" id="divFinalizar" style="display: none;">
                                    <div class="col d-grid">
                                        <button type="button" name="btnFinalizar" id="btnFinalizar" class="btn btn-outline-success">Finalizar Atividade</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" id="divProjetoTerafas">
                            <div class="mb-3 form-floating">
                                <input class="form-control" list="listTarefas" id="listTarefa" placeholder="Tarefa" required>
                                <datalist id="listTarefas">
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM tarefas");
                                    while ($value =  mysqli_fetch_assoc($query)) {
                                        echo '<option value="' . $value['nome'] . '">';
                                    }
                                    ?>
                                </datalist>
                                <label>Selecione uma Tarefa</label>
                            </div>
                            <div class="mb-2 form-floating">
                                <input class="form-control" list="listProjeto" id="nomeProjeto" placeholder="Projeto" required>
                                <datalist id="listProjeto">
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM projetos");
                                    while ($value =  mysqli_fetch_assoc($query)) {
                                        echo '<option value="' . $value['nome'] . '">';
                                    }
                                    ?>
                                </datalist>
                                <label>Selecione um Projeto</label>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Registros</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Projeto</th>
                                <th scope="col">Total Horas</th>
                                <th scope="col">Valor Total</th>
                                <th scope="col">Descrição</th>
                            </tr>
                        </thead>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM registros");
                        while ($value = mysqli_fetch_assoc($query)) {
                            echo '<tr>';
                            echo '<td>' . $value['tempoInicial'] . '</td>';
                            echo '<td>' . $value['idProjeto'] . '</td>';
                            echo '<td>' . $value['tempoTotal'] . '</td>';
                            echo '<td> R$ 0,00 </td>';
                            echo '<td>' . $value['descricao'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        ?>
                    </table>
                </div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Relação de horas no mes - CLIENTE X</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Próximo</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Anterior</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            Período
                        </button>
                    </div>
                </div>
                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </main>
        </div>
    </div>

    <!-- Modal -->
    <!-- INICIO - Modal Cliente -->
    <div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="modalCliente" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registrar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="fechar"></button>
                </div>
                <form action="assets/dist/sql/sql.php" method="post">
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
                                    $query = mysqli_query($conn, "SELECT * FROM cliente");
                                    while ($value =  mysqli_fetch_assoc($query)) {
                                        echo '<option value="' . $value['nome'] . '">';
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <div class="col mb-2">
                                <input class="form-control" list="listTarefas" name="tarefa" placeholder="Tarefa">
                                <datalist id="listTarefas">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="assets/dist/sql/sql.php" method="post">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" name="validaOpcao" value="cadastrarTarefa" id="cadastrarTarefa" class="btn btn-primary">Cadastrar</button>
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
</body>
<script>
    document.getElementById("btnRegistroHoras").addEventListener("click", function() {
        btnInfHoras();
        registrarHoras();
    });
    document.getElementById('btnFinalizar').addEventListener('click', function() {
        finalizarRegistroHoras();
    })

    setInterval(() => {
        btnInfHoras();
    }, 1000);
</script>
<script>
    // 
    /***    comando para formatar string
     * 
     * n1.toLocaleString('pt-BR', {style: 'currency', currency:'BRL'})
     * 
     */
</script>

</html>
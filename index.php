<?php
include 'assets/dist/php/sql.php';
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
<title> Apontamento de Horas </title>

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
    <?php
    navHeader();
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            nav('dashboard');
            ?>
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
                                    listaTarefas();
                                    ?>
                                </datalist>
                                <label>Selecione uma Tarefa</label>
                            </div>
                            <div class="mb-2 form-floating">
                                <input class="form-control" list="listProjeto" id="nomeProjeto" placeholder="Projeto" required>
                                <datalist id="listProjeto">
                                    <?php
                                    listProjeto();
                                    ?>
                                </datalist>
                                <label>Selecione um Projeto</label>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Registros</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm" id="tabelaRegistros">
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
                        montarTabela(null,null);
                        ?>
                    </table>
                </div>
                <?php
                estruturaFooter();
                ?>
            </main>
        </div>
    </div>
    <?php
    
    estruturaModal();
    ?>


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
        // atualizarRegistros()
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
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="col">
        <div class="p-2 me-2 bg-primary text-white">Relação de horas - <?php echo $idCliente; ?></div>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="#" data-bs-target="#selecionarCliente" data-bs-toggle="modal">
                <button type="button" class="btn btn-sm btn-outline-secondary">Selecionar Cliente</button>
            </a>
            <a href="relatorio">
                <button type="button" class="btn btn-sm btn-outline-secondary">Todos</button>
            </a>
        </div>
        <div class="dropdown">
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle me-2" id="dropdownAno" data-bs-toggle="dropdown" aria-expanded="false">
                <span data-feather="calendar"></span>
                Ano
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownAno">
                <li><a class="dropdown-item" href="#">2019</a></li>
                <li><a class="dropdown-item" href="#">2021</a></li>
                <li><a class="dropdown-item" href="#">2022</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Ano Atual</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle me-2" id="dropdownMes" data-bs-toggle="dropdown" aria-expanded="false">
                <span data-feather="calendar"></span>
                <?php echo $mes; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMes">
                <li><a class="dropdown-item" href="relatorio&m=atual">Mês Atual</a></li>
                <li><a class="dropdown-item" href="relatorio&m=anterior">Mês Anterior</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="relatorio&m=1">Janeiro</a></li>
                <li><a class="dropdown-item" href="relatorio&m=2">Fevereiro</a></li>
                <li><a class="dropdown-item" href="relatorio&m=3">Março</a></li>
                <li><a class="dropdown-item" href="relatorio&m=4">Abril</a></li>
                <li><a class="dropdown-item" href="relatorio&m=5">Maio</a></li>
                <li><a class="dropdown-item" href="relatorio&m=6">Junho</a></li>
                <li><a class="dropdown-item" href="relatorio&m=7">Julho</a></li>
                <li><a class="dropdown-item" href="relatorio&m=8">Agosto</a></li>
                <li><a class="dropdown-item" href="relatorio&m=9">Setembro</a></li>
                <li><a class="dropdown-item" href="relatorio&m=10">Outubro</a></li>
                <li><a class="dropdown-item" href="relatorio&m=11">Novembro</a></li>
                <li><a class="dropdown-item" href="relatorio&m=12">Dezembro</a></li>
            </ul>
        </div>
    </div>
</div>
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
        montarTabela($buscarProjeto, $mes);
        ?>
    </table>
</div>
<div class="col">
    <strong>
        <div class="p-2 bg-secondary text-white">PIX : <?php echo $pix; ?></div>
    </strong>
</div>

    <!-- INICIO - Modal Selecionar Cliente -->
    <div class="modal fade" id="selecionarCliente" tabindex="-1" aria-labelledby="selecionarCliente" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title">Selecionar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="relatorio" method="post">
                    <div class="modal-body py-0">
                        <input class="form-control" list="litsP" name="buscarProjeto" placeholder="Projeto" required>
                        <datalist id="litsP">
                            <?php
                            listProjeto();
                            ?>
                        </datalist>
                    </div>
                    <div class="modal-footer flex-column border-top-0">
                        <button type="submit" class="btn btn-lg btn-primary w-100 mx-0 mb-2">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FIM - Modal Selecionar Cliente -->



</body>

</html>
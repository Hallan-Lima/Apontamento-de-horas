<?php

function nav($active)
{
    $activeDashboard = '';
    $activeRelatorio = '';
    $active_AtualizarCadastroCliente = '';
    $active_AtualizarCadastroProjeto = '';
    $active_AtualizarCadastroTarefa = '';
    switch ($active) {
        case 'dashboard':
            $activeDashboard = 'active';
            break;
        case 'relatorio':
            $activeRelatorio = 'active';
            break;
        case 'atualizarCadastroCliente':
            $active_AtualizarCadastroCliente = 'active';
            break;

        default:
        $activeDashboard = '';
        $activeRelatorio = '';
        $active_AtualizarCadastroCliente = '';
        $active_AtualizarCadastroProjeto = '';
        $active_AtualizarCadastroTarefa = '';
            break;
    }
    echo '
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link ' . $activeDashboard . '" aria-current="page" href="index">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
              <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="file"></span>
                        Registros
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link ' . $activeRelatorio . '" href="relatorio">
                        <span data-feather="bar-chart-2"></span>
                        Relatório
                    </a>
                </li>
               <!-- <li class="nav-item">
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
                </li> -->
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Atualizar</span>
                <a class="link-secondary">
                    <span data-feather="repeat"></span>
                </a>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link ' . $active_AtualizarCadastroCliente . '" href="atualizarCadastro&cliente">
                        <span data-feather="file-text"></span>
                        Cliente
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . $active_AtualizarCadastroProjeto . '" href="atualizarCadastro&projeto">
                    <span data-feather="file-text"></span>
                        Projeto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . $active_AtualizarCadastroTarefa . '" href="atualizarCadastro&tarefa">
                    <span data-feather="file-text"></span>
                        Tarefa
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
    ';
}
function navHeader($paramet) {
    $html = '
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index">Apontamento de horas</a>
    </header>
    <body>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="facebook" viewBox="0 0 16 16">
        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
    </symbol>
    <symbol id="instagram" viewBox="0 0 16 16">
        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
    </symbol>
    <symbol id="twitter" viewBox="0 0 16 16">
        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
    </symbol>
</svg>
<div class="container-fluid">
<div class="row">';
$html .= nav($paramet);
$html .= '<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">';

    return $html;
}

function estruturaFooter() {
    $dados = dados();
    echo '
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Desenvolvido por <a href="https://portfolio.ghz.life/" target="_blank" class=" text-muted">Ghz.life</a></span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <a class="me-2" href="'.$dados['contatoTel']. '" target="_blank" rel="whatsapp"><img src="https://img.icons8.com/ios-filled/24/6c757d/whatsapp--v1.png"/></a>
            <a class="me-2" href="'.$dados['contatoLinkedin'].'" target="_blank" rel="linkedin"><img src="https://img.icons8.com/ios-filled/24/6c757d/linkedin--v1.png" /></a>
            <a class="me-2" href="'.$dados['contatoFac'].'" target="_blank" rel="facebook"><img src="https://img.icons8.com/ios-filled/24/6c757d/facebook--v1.png" /></a>
            <a class="me-2" href="'.$dados['contatoSkype'].'" target="_blank" rel="skype"><img src="https://img.icons8.com/ios-filled/24/6c757d/skype--v1.png" /></a>
            <a class="me-2" href="'. $dados['contatoGithub'].'" target="_blank" rel="github"><img src="https://img.icons8.com/ios-filled/24/6c757d/github--v1.png" /></a>
            <a class="me-2" href="'. $dados['contatoEmail'].'" target="_blank" rel="email"><img src="https://img.icons8.com/ios-filled/24/6c757d/email-open--v1.png" /></a>
        </ul>
    </footer>
    </main>
    </div>
</div>

</body>
    ';
}
function atualizarCadastroCliente($cliente){
if (!$cliente) {
    $html = '
    <div class="row">
        <div class="col">
            <div class="my-2 mb-2 form-floating">
                <input class="form-control" list="listClientes" id="nomeCliente" placeholder="Cliente" required>
                <datalist id="listClientes">';
                $html .= listClientes();
                $html .='
                </datalist>
                <label>Selecione um cliente</label>
            </div>
        </div>
        <div class="col-auto" style="margin-block: auto;">
            <button type="button" id="btnNomeCliente" class="btn btn-outline-success">Buscar</button>
        </div>
    </div>';
    
    return $html;

}else {
    require_once 'sql.php';
    $obj = array(
        'inf' => 'infClienteCompleto',
        'cliente' => $cliente
    );
    $obj = montarQuery($obj);
    $obj = mysqli_fetch_assoc($obj);
    if (!$obj) {
        die;
    }
        $html = '
        <div class="modal-content">
        <form action="assets/dist/php/sql.php" method="post">
            <div class="modal-header">
                <h5 class="modal-title">Registro - '.$obj['nome'].'</h5>
                <div>
                    <button type="button" class="btn btn-outline-danger">Deletar Cliente</button>
                    <button type="button" onclick="buscarInf(`'.$obj['nome'].'`)" class="btn btn-outline-danger">Descartar Alterações</button>
                    <button type="button" class="btn btn-outline-info">Ver Projetos</button>
                    <button type="submit" name="validaOpcao" value="atualizarCliente" class="btn btn-outline-success">Atualizar</button>
                </div>
            </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col">
                            <input class="d-none" name="idCliente" value="'.$obj['id'].'">
                            <input type="text" class="form-control" name="nome" placeholder="Nome" aria-label="nome" value="'.$obj['nome'].'" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="valor" placeholder="R$ por Hora" aria-label="valor por hora" value="'.$obj['valor'].'" required>
                        </div>
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control" rows="3" name="descricao" placeholder="Descrição">'.$obj['descricao'].'</textarea>
                    </div>
                    <div class="row">
                        <div class="col mb-2">
                            <input type="text" class="form-control" name="telefone" placeholder="Telefone" aria-label="telefone" value="'.$obj['telefone'].'">
                        </div>
                        <div class="col mb-2">
                            <input type="text" class="form-control" name="email" placeholder="Email" aria-label="email" value="'.$obj['email'].'">
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        ';

        echo $html;
    }
}
if (isset($_GET['nomeCliente'])) {
    atualizarCadastroCliente($_GET['nomeCliente']);
}
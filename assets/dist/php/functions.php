<?php
$contatoTel       = 'http://api.whatsapp.com/send?1=pt_BR&phone=55019997202594';
$contatoFac       = 'https://www.facebook.com/3301NNY';
$contatoLinkedin  = 'https://www.linkedin.com/in/h%C3%A1llan/';
$contatoSkype     = 'https://join.skype.com/invite/DeIl7tg4Ohxd';
$contatoGithub    = 'https://github.com/Hallan-Lima';
$contatoEmail     = 'mailto:hallansrl@hotmail.com';

function nav($active)
{
    $activeDashboard = '';
    $activeRelatorio = '';
    switch ($active) {
        case 'dashboard':
            $activeDashboard = 'active';
            break;
        case 'relatorio':
            $activeRelatorio = 'active';
            break;

        default:
            break;
    }
    echo '
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link ' . $activeDashboard . '" aria-current="page" href="../../index.php">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
                <!--- <li class="nav-item">
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
                </li> --->
                <li class="nav-item">
                    <a class="nav-link ' . $activeRelatorio . '" href="assets/pages/relatorio.php">
                        <span data-feather="bar-chart-2"></span>
                        Relatório
                    </a>
                </li>
                <!--- <li class="nav-item">
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
                </li> --->
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
function navHeader()
{
    echo '
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Apontamento de horas</a>
    </header>
    ';
}
function estruturaModal()
{
    echo '
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
                                    listClientes();
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
    
    
    ';
}
function estruturaFooter()
{
    echo '
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Desenvolvido por <a href="https://portfolio.ghz.life/" target="_blank" class=" text-muted">Ghz.life</a></span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <a class="me-2" href="<?php echo $contatoTel; ?>" target="_blank" rel="whatsapp"><img src="https://img.icons8.com/ios-filled/24/6c757d/whatsapp--v1.png"/></a>
            <a class="me-2" href="<?php echo $contatoLinkedin; ?>" target="_blank" rel="linkedin"><img src="https://img.icons8.com/ios-filled/24/6c757d/linkedin--v1.png" /></a>
            <a class="me-2" href="<?php echo $contatoFac; ?>" target="_blank" rel="facebook"><img src="https://img.icons8.com/ios-filled/24/6c757d/facebook--v1.png" /></a>
            <a class="me-2" href="<?php echo $contatoSkype; ?>" target="_blank" rel="skype"><img src="https://img.icons8.com/ios-filled/24/6c757d/skype--v1.png" /></a>
            <a class="me-2" href="<?php echo $contatoGithub; ?>" target="_blank" rel="github"><img src="https://img.icons8.com/ios-filled/24/6c757d/github--v1.png" /></a>
            <a class="me-2" href="<?php echo $contatoEmail; ?>" target="_blank" rel="email"><img src="https://img.icons8.com/ios-filled/24/6c757d/email-open--v1.png" /></a>
        </ul>
    </footer>
    ';
}

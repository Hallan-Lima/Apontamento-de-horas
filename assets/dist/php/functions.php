<?php
$contatoTel       = 'http://api.whatsapp.com/send?1=pt_BR&phone=55019997202594';
$contatoFac       = 'https://www.facebook.com/3301NNY';
$contatoLinkedin  = 'https://www.linkedin.com/in/h%C3%A1llan/';
$contatoSkype     = 'https://join.skype.com/invite/DeIl7tg4Ohxd';
$contatoGithub    = 'https://github.com/Hallan-Lima';
$contatoEmail     = 'mailto:hallansrl@hotmail.com';
$pix              = '';


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
                    <a class="nav-link ' . $activeDashboard . '" aria-current="page" href="index">
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
                    <a class="nav-link ' . $activeRelatorio . '" href="relatorio">
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
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index">Apontamento de horas</a>
    </header>
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

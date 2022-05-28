<?php
function montarTabela() {
    include '../sql/.env';

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
}
function listaTarefas() {
    include '../sql/.env';

    $query = mysqli_query($conn, "SELECT * FROM tarefas");
    while ($value =  mysqli_fetch_assoc($query)) {
        echo '<option value="' . $value['nome'] . '">';
    }
}
function listProjeto() {
    include '../sql/.env';

    $query = mysqli_query($conn, "SELECT * FROM projetos");
    while ($value =  mysqli_fetch_assoc($query)) {
        echo '<option value="' . $value['nome'] . '">';
    }
}
function listClientes() {
    include '../sql/.env';

    $query = mysqli_query($conn, "SELECT * FROM cliente");
    while ($value =  mysqli_fetch_assoc($query)) {
        echo '<option value="' . $value['nome'] . '">';
    }
}

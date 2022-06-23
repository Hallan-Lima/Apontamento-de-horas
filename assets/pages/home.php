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


</html>
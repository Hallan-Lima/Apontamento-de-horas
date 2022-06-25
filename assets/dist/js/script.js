valor_inicialHora=null;
tempoSegundos=00;
ss=00;
mm=00;
hh=00;

function btnInfHoras() {
    var btnRegistroHoras = document.getElementById("btnRegistroHoras");
    var totalHora = document.getElementById('totalHora');
    valorHoraInicio = document.getElementById('valorHoraInicio').value;
    valorHoraFim = document.getElementById('valorHoraFim').value;
    validaTexto = btnRegistroHoras.innerText;
    
    valorHoraFim = valorHoraFim.split(' ');
    valorHoraInicio = valorHoraInicio.split(' ');

    if (valorHoraInicio[1]) {
        if (valorHoraFim[1]) {
            valorInicialArray = valorHoraInicio[1].split(':');
            valorFinalArray = valorHoraFim[1].split(':');
            if (valorHoraInicio[2] == 'PM') {
                valorInicialArray[0]+12;
            }
            if (valorHoraFim[2] == 'PM') {
                valorFinalArray[0]+12;
            }
            segundosFinal = (parseInt(valorFinalArray[1])*60)+(parseInt(valorFinalArray[0])*3600);
            segundosInicial = (parseInt(valorInicialArray[1])*60)+(parseInt(valorInicialArray[0])*3600);
            dias = parseInt(valorHoraFim[0]) - parseInt(valorHoraInicio[0]);
            dias = dias*86400;
            if (dias < 0) {
                dias = 0;
            }
            horasRegistro = segundosFinal-segundosInicial;
            segundos = horasRegistro+dias;
            btnRegistroHoras.innerText = 'CRIAR REGISTRO';
            btnRegistroHoras.name = 'cadastrarRegistro';
            validarCampos();
        }else{
        if (validaTexto == 'CRIAR REGISTRO') {
            reiniciarValores('totalHora');
            reiniciarValores('btnRegistroHoras');
        }}
    }else{
    if (validaTexto == 'CRIAR REGISTRO') {
        reiniciarValores('totalHora');
        reiniciarValores('btnRegistroHoras');
    }}
}

function reiniciarValores(obj) {
    var btnRegistroHoras = document.getElementById("btnRegistroHoras");
    var totalHora = document.getElementById('totalHora');
    var divProjetoTerafas = document.getElementById('divProjetoTerafas');
    var txtDescricao = document.getElementById('texteareaDescricao');
    var inicioHora = document.getElementById('inicioHora');
    var fimHora = document.getElementById('fimHora');
    var divFinalizar = document.getElementById('divFinalizar');
    var nomeProjeto = document.getElementById('nomeProjeto');
    var listTarefa = document.getElementById('listTarefa');
    var divInformacao = document.getElementById('divInformacao');
    var valor_inicioHora = document.getElementById('valorHoraInicio');
    var valor_fimHora = document.getElementById('valorHoraFim');

    switch (obj) {
        case 'totalHora':
            totalHora.value = '00:00:00';
            totalHora.disabled = false;
            break;
        case 'btnRegistroHoras':
            btnRegistroHoras.innerText = 'Começar a trabalhar'
            btnRegistroHoras.name = 'iniciarRegistroHoras';
            break;
        case 'total':
            btnRegistroHoras.innerText = 'Começar a trabalhar'
            btnRegistroHoras.name = 'iniciarRegistroHoras';
            txtDescricao.value = '';
            valor_fimHora.value = '';
            valor_inicioHora.value = '';
            listTarefa.value = '';
            nomeProjeto.value = '';
            totalHora.value = '00:00:00';
            totalHora.disabled = false;
            divProjetoTerafas.style.display = 'block';
            txtDescricao.style.display = 'block';
            fimHora.style.display = 'block';
            inicioHora.style.display = 'block';
            divInformacao.style.display = 'none';
            divFinalizar.style.display = 'none';
            listTarefa.classList.remove('is-invalid');
            listTarefa.classList.remove('is-valid');
            nomeProjeto.classList.remove('is-invalid');
            nomeProjeto.classList.remove('is-valid');
            btnRegistroHoras.classList.remove('btn-outline-secondary');
            btnRegistroHoras.classList.add('btn-outline-success');
            hh = 00;
            mm = 00;
            ss = 00;
            break;
    
        default:
            break;
    }
}

//função que valida o status do botão
function registrarHoras() {
    v = validarCampos();
    if (v) {
        var clicando = 0;
        var totalHora = document.getElementById('totalHora');
        var btnRegistroHoras = document.getElementById("btnRegistroHoras");
        if ((btnRegistroHoras.name == 'registroPausado')&&(clicando == 0)) {
            btnRegistroHoras.name = 'registrandoHoras';
            valida = validarCampos();
            if (valida) {
                starTimer(totalHora);
            }
            clicando++;
        }
        if ((btnRegistroHoras.name == 'registrandoHoras')&&(clicando == 0)) {
            btnRegistroHoras.name = 'registroPausado'
            btnRegistroHoras.innerText = 'PAUSADO';       
            pausarRegistroHoras();
            clicando++;
        }
        if ((btnRegistroHoras.name == 'cadastrarRegistro')&&(clicando == 0)) {
            finalizarRegistroHoras('registrar');
            btnRegistroHoras.name = 'iniciarRegistroHoras'
            clicando++;
        }
        if ((btnRegistroHoras.name == 'iniciarRegistroHoras')&&(clicando == 0)) {
            totalHora.disabled = true;
            totalHora.value = '00:00:00';
            btnRegistroHoras.name = 'registrandoHoras';

            valida = validarCampos();
            if (valida) {
                starTimer(totalHora);
            }
            clicando++;
        }
    }    
}
function validarCampos() {
    var btnRegistroHoras = document.getElementById("btnRegistroHoras");
    var nomeProjeto = document.getElementById('nomeProjeto');
    var listTarefa = document.getElementById('listTarefa');
    var txtDescricao = document.getElementById('texteareaDescricao');
    var inicioHora = document.getElementById('inicioHora');
    var fimHora = document.getElementById('fimHora');
    var divProjetoTerafas = document.getElementById('divProjetoTerafas');
    var divFinalizar = document.getElementById('divFinalizar');
    var divInformacao = document.getElementById('divInformacao');
    var projetoTarefa = document.getElementById('msgProjeto_Tarefa');
    var valida = 0;
    nameRegistroHoras = btnRegistroHoras.name;

    valida_nomeProjeto = validaCampoVazio(nomeProjeto);
    valida_listTarefa = validaCampoVazio(listTarefa);
    valida += tratamentoValida(valida_nomeProjeto, nomeProjeto);
    valida += tratamentoValida(valida_listTarefa, listTarefa);
    if (valida >= 2 && nameRegistroHoras != 'cadastrarRegistro' ) {
        projetoTarefa.innerText = nomeProjeto.value+' - '+listTarefa.value;
        divProjetoTerafas.style.display = 'none';
        txtDescricao.style.display = 'none';
        fimHora.style.display = 'none';
        inicioHora.style.display = 'none';
        divInformacao.style.display = 'block';
        divFinalizar.style.display = 'block';
        btnRegistroHoras.classList.remove('btn-outline-success');
        btnRegistroHoras.classList.add('btn-outline-secondary');
        btnRegistroHoras.innerText = 'Clique aqui para pausar';
        valor_inicialHora = moment().format('DD/MM/YYYY hh:mm:ss A'); 
        result = true;     
    }else{
        result = false;     
    }
    if (valida >= 2 && nameRegistroHoras == 'cadastrarRegistro') {
        result = true;
    }
    return result;
}
function starTimer(display) {
    cron = setInterval(() => { timer(display); }, 1000);
}
function pausarRegistroHoras() {
    clearInterval(cron);
}
function finalizarRegistroHoras(obj) {
    var totalHora = document.getElementById('totalHora').value;
    var nomeProjeto = document.getElementById('nomeProjeto').value;
    var listTarefa = document.getElementById('listTarefa').value;
    var txtDescricao = document.getElementById('texteareaDescricao').value;
    if (obj == 'registrar') {
        valorHoraFim = document.getElementById('valorHoraFim').value;
        valor_inicialHora = document.getElementById('valorHoraInicio').value;

    }else{
        var valorHoraFim = moment().format('DD/MM/YYYY hh:mm:ss A'); 
        clearInterval(cron);
    }
    reiniciarValores('total');
    $.post( "assets/dist/php/sql.php", { 
        validaOpcao: 'registroHoras',
        descricao: txtDescricao,
        valor:  totalHora,
        valorHoraInicio:  valor_inicialHora,
        valorHoraFim: valorHoraFim,
        tarefa: listTarefa,
        projeto: nomeProjeto,
    } )
    .done(function( data ) {
    console.log( "Sucesso: " + data );
    });
}
function timer(display) {
    ++ss;
    ++tempoSegundos;
    console.log(tempoSegundos);
    if (ss == 60) {
        ss = 00;
        ++mm;
    if(mm == 60) {
        mm = 00;
        ++hh;
    }}
    ss = ss*1;
    v = ss - 10
    if (v < 0) {
        ss = '0'+ss;
    }
    mm = mm*1;
    v = mm - 10;
    if (v < 0) {
        mm = '0'+mm;
    }
    hh = hh*1;
    v = hh - 10;
    if (v < 0) {
        hh = '0'+hh;
    }
    t = hh+':'+mm+':'+ss;
    display.value = t;
}

function validaCampoVazio(obj) {
    obj = obj.value;
    result = false;
    if (obj != '') {
        if (obj != null) {
            result = true;
        }
    } 
    return result;
}
function tratamentoValida(obj, campoIncluirClass) {
    campoIncluirClass.classList.remove('is-invalid');
    campoIncluirClass.classList.remove('is-valid');
    if (obj) {
        var validaCampo = 1;
        campoIncluirClass.classList.add('is-valid');
    }else{
        var validaCampo = 0;
        campoIncluirClass.classList.add('is-invalid');
    }
    return validaCampo;
}

let btnNomeCliente = document.getElementById('btnNomeCliente');
btnNomeCliente.addEventListener("click", function() {
    let nomeCliente = document.getElementById('nomeCliente');
    const SPAN_CONTEUDO = document.getElementById('conteudoAtualizarCadastro');
    if (nomeCliente.value != '') {
        const BASE_URL = 'http://localhost/www/Apontamento%20de%20horas/assets/dist/php/functions.php?';
        dados = 'nomeCliente='+nomeCliente.value;
        $.post( BASE_URL+dados, function( data ) {
            $(SPAN_CONTEUDO).html( data );
            btnNomeCliente.innerText = 'Atualizar Registro'
        });
        SPAN_CONTEUDO.style.display = 'block';
    }else{
        if (btnNomeCliente.innerText != 'Buscar') {
            btnNomeCliente.innerText = 'Buscar';
            SPAN_CONTEUDO.style.display = 'none';
        }
    }
});
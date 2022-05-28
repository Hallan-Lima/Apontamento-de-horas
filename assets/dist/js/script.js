ss=00;
mm=00;
hh=00;

function btnInfHoras() {
    var btnRegistroHoras = document.getElementById("btnRegistroHoras");
    var totalHora = document.getElementById('totalHora');
    valorHoraInicio = document.getElementById('valorHoraInicio').value;
    valorHoraFim = document.getElementById('valorHoraFim').value;
    valida = btnRegistroHoras.innerText;
    
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
            horas = formatahhmmss(segundos);
            totalHora.value = horas;
            btnRegistroHoras.innerText = 'CRIAR REGISTRO';
            btnRegistroHoras.name = 'cadastrarRegistro';
            validarCampos();
        }else{
        if (valida == 'CRIAR REGISTRO') {
            reiniciarValores('totalHora');
            reiniciarValores('btnRegistroHoras');
        }}
    }else{
    if (valida == 'CRIAR REGISTRO') {
        reiniciarValores('totalHora');
        reiniciarValores('btnRegistroHoras');
    }}
}
function formatahhmmss(s){
    function duas_casas(numero){
      if (numero <= 9){
        numero = "0"+numero;
      }
      return numero;
    }
    hora = duas_casas(Math.round(s/3600));
    minuto = duas_casas(Math.round((s%3600)/60));
    segundo = duas_casas((s%3600)%60);
    formatado = hora+":"+minuto+":"+segundo;
  
    return formatado;
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
    valida = validarCampos();
    if (valida) {
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
        valida = true;     
    }else{
        valida = false;     
    }
    return valida;
}
function starTimer(display) {
    cron = setInterval(() => { timer(display); }, 1000);
}
function pausarRegistroHoras() {
    clearInterval(cron);
}
function finalizarRegistroHoras() {
    var totalHora = document.getElementById('totalHora').value;
    var nomeProjeto = document.getElementById('nomeProjeto').value;
    var listTarefa = document.getElementById('listTarefa').value;
    var valorHoraInicio = document.getElementById('valorHoraInicio').value;
    var valorHoraFim = document.getElementById('valorHoraFim').value;

    clearInterval(cron);
    reiniciarValores('total');

    $.ajax({
        url : "assets/dist/sql/sql.php",
        type : 'post',
        data : {
             validaOpcao: 'validaOpcao',
             horas: totalHora,
             projeto: nomeProjeto,
             tarefa: listTarefa,
             inicioHora: valorHoraInicio,
             fimHora: valorHoraFim

        },
        beforeSend : function(){
             $("#resultado").html("ENVIANDO...");
             console.log('enviado')
        }
    })
    .done(function(msg){
        $("#resultado").html(msg);
    })
    .fail(function(jqXHR, textStatus, msg){
        alert(msg);
    });
}
function timer(display) {
    ss++;
    if (ss == 59) {
        ss = 00;
        mm++;
    if(mm == 59) {
        mm = 00;
        hh++;
    }}
    mm = mm*1;
    v = mm - 10
    if (v < 0) {
        mm = '0'+mm;
    }
    ss = ss*1;
    v = ss - 10
    if (v < 0) {
        ss = '0'+ss;
    }
    hh = hh*1;
    v = hh - 10
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
function contadorHoras(obj) {
    switch (obj) {
        case 'hhmm':
            obj = moment().format('h:mm');
            break;
    
        default:
            break;
    }
    return obj;
}
function tratamentoValida(obj, campoIncluirClass) {
    campoIncluirClass.classList.remove('is-invalid');
    campoIncluirClass.classList.remove('is-valid');
    if (obj) {
        var valida = 1;
        campoIncluirClass.classList.add('is-valid');
    }else{
        var valida = 0;
        campoIncluirClass.classList.add('is-invalid');
    }
    return valida;
}
ss=00;
mm=00;
hh=00;

console.log('teste')
//função que valida o status do botão
function btnRegistroHoras() {
    var btnRegistroHoras = document.getElementById("btnRegistroHoras");
    var clicando = 0;

    if ((btnRegistroHoras.name == 'registroPausado')&&(clicando == 0)) {
        btnRegistroHoras.name = 'registrandoHoras';
        iniciarRegistroHoras(btnRegistroHoras);
        clicando++;
    }
    if ((btnRegistroHoras.name == 'registrandoHoras')&&(clicando == 0)) {
        btnRegistroHoras.name = 'registroPausado'
        btnRegistroHoras.innerText = 'PAUSADO';       
        pausarRegistroHoras();
        clicando++;
    }
    if ((btnRegistroHoras.name == 'iniciarRegistroHoras')&&(clicando == 0)) {
        var totalHora = document.getElementById('totalHora');
        totalHora.value = '00:00:00';
        btnRegistroHoras.name = 'registrandoHoras';
        iniciarRegistroHoras(btnRegistroHoras);
        clicando++;
    }
    
}
function iniciarRegistroHoras(btnRegistroHoras) {
    var nomeProjeto = document.getElementById('nomeProjeto');
    var listTarefa = document.getElementById('listTarefa');
    var txtDescricao = document.getElementById('texteareaDescricao');
    var inicioHora = document.getElementById('inicioHora');
    var fimHora = document.getElementById('fimHora');
    var totalHora = document.getElementById('totalHora');
    var valida = 0;

    valida_nomeProjeto = validaCampoVazio(nomeProjeto);
    valida_listTarefa = validaCampoVazio(listTarefa);
    valida += tratamentoValida(valida_nomeProjeto, nomeProjeto);
    valida += tratamentoValida(valida_listTarefa, listTarefa);
    if (valida >= 2) {
        nomeProjeto.style.display = 'none';
        listTarefa.style.display = 'none';
        txtDescricao.style.display = 'none';
        fimHora.style.display = 'none';
        inicioHora.style.display = 'none';
        btnRegistroHoras.innerText = 'TRABALHANDO';       
        starTimer(totalHora);
    }
}
function starTimer(display) {
    cron = setInterval(() => { timer(display); }, 1000);
}
function pausarRegistroHoras() {
    clearInterval(cron);
}
function finalizarRegistroHoras(obj) {
    clearInterval(cron);
    hh = 00;
    mm = 00;
    ss = 00;
    obj.value = '00:00:00';
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
    if (obj) {
        var valida = 1;
        campoIncluirClass.classList.add('is-valid');
        campoIncluirClass.classList.remove('is-invalid');;
    }else{
        var valida = 0;
        campoIncluirClass.classList.add('is-invalid');
        campoIncluirClass.classList.remove('is-valid');;
    }
    return valida;
}


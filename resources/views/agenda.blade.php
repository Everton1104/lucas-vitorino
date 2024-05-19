@extends('layouts.app')

@section('title')
   - Agenda
@endsection

@section('scriptEnd')
    <style>
        .hora{
            cursor: pointer;
        }
        .hora:hover{
            border: 1px solid;
            border-radius: 20%;
            padding: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="text-center my-5">
            <span class="text-secondary">Não perca tempo agende seu horário</span>
            <br>
            <span class="fs-1">AGENDA SEMANAL</span>
        </div>
        <div class="container text-center">
            <div class="my-5 row justify-content-center">
                <span class="btn btn-lg btn-secondary my-3" role="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1">
                    SEGUNDA-FEIRA
                </span>
                <div class="collapse border rounded p-3 my-3 col-3" id="collapseExample1">
                    @foreach ($dados as $dado)
                        <span class="hora">{{date('H:i', strtotime($dado->data))}}</span><br>
                    @endforeach
                </div>
                <span class="btn btn-lg btn-secondary my-3" role="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2">
                    TERÇA-FEIRA
                </span>
                <div class="collapse border rounded p-3 my-3 col-3" id="collapseExample2">
                    @foreach ($dados as $dado)
                        <span class="hora">{{date('H:i', strtotime($dado->data))}}</span><br>
                    @endforeach
                </div>
                <span class="btn btn-lg btn-secondary my-3" role="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3">
                    QUARTA-FEIRA
                </span>
                <div class="collapse border rounded p-3 my-3 col-3" id="collapseExample3">
                    @foreach ($dados as $dado)
                        <span class="hora">{{date('H:i', strtotime($dado->data))}}</span><br>
                    @endforeach
                </div>
                <span class="btn btn-lg btn-secondary my-3" role="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4">
                    QUINTA-FEIRA
                </span>
                <div class="collapse border rounded p-3 my-3 col-3" id="collapseExample4">
                    @foreach ($dados as $dado)
                        <span class="hora">{{date('H:i', strtotime($dado->data))}}</span><br>
                    @endforeach
                </div>
                <span class="btn btn-lg btn-secondary my-3" role="button" data-bs-toggle="collapse" data-bs-target="#collapseExample5">
                    SEXTA-FEIRA
                </span>
                <div class="collapse border rounded p-3 my-3 col-3" id="collapseExample5">
                    @foreach ($dados as $dado)
                        <span class="hora">{{date('H:i', strtotime($dado->data))}}</span><br>
                    @endforeach
                </div>
                <span class="btn btn-lg btn-secondary my-3" role="button" data-bs-toggle="collapse" data-bs-target="#collapseExample6">
                    SÁBADO
                </span>
                <div class="collapse border rounded p-3 my-3 col-3" id="collapseExample6">
                    @foreach ($dados as $dado)
                        <span class="hora">{{date('H:i', strtotime($dado->data))}}</span><br>
                    @endforeach
                </div>
                <span class="btn btn-lg btn-secondary my-3" role="button" data-bs-toggle="collapse" data-bs-target="#collapseExample7">
                    DOMINGO
                </span>
                <div class="collapse border rounded p-3 my-3 col-3" id="collapseExample7">
                    @foreach ($dados as $dado)
                        <span class="hora">{{date('H:i', strtotime($dado->data))}}</span><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="calendario" class="d-none"></div>
@endsection

@section('scriptEnd')
    <script>
        // chama a funcao após carregamento da pagina
        $(document).ready(() => {
            gerarCalendario()
        })

        function gerarCalendario(data) {
            dados = JSON.parse('{!!json_encode($dados)!!}')
            mes_ptbr = new Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro","Outubro", "Novembro", "Dezembro")
            data ? data = new Date(data) : data = new Date()
            ano = data.getFullYear()
            mes = data.getMonth()
            hoje = new Date()
            limit_dias = new Array(31, (!(ano % 4) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31)
            txt = 
            "<div class='row'>"+
                "<h2 class='col-7 text-center'>" + mes_ptbr[mes] + " de " + ano + "</h2>" +
                "<div class='col-1'><a class='btn btn-sm btn-primary' href=javascript:gerarCalendario('" + (ano - 1) + "-" + (mes + 1) + "-1') title='Ano Anterior'> << </a></div>" +
                "<div class='col-1'><a class='btn btn-sm btn-primary' href=javascript:gerarCalendario('" + ((mes == 0) ? (ano - 1) : ano) + "-" + ((mes == 0) ? 12 : mes) + "-1') title='Mês Anterior'> < </a></div>" +
                "<div class='col-1'><a class='btn btn-sm btn-primary' href=javascript:gerarCalendario('" + hoje.getFullYear() + "-" + (hoje.getMonth() + 1) + "-" + hoje.getDate() + "') title='Hoje'>⚪</a></div>" +
                "<div class='col-1'><a class='btn btn-sm btn-primary' href=javascript:gerarCalendario('" + ((mes == 11) ? (ano + 1) : ano) + "-" + ((mes == 11) ? 1 : (mes + 2)) + "-1') title='Próximo Mês'> > </a></div>" +
                "<div class='col-1'><a class='btn btn-sm btn-primary' href=javascript:gerarCalendario('" + (ano + 1) + "-" + (mes + 1) + "-1') title='Próximo Ano'> >> </a></div>" +
            "</div>" +
            "<div class='table-responsive'>" +
                "<table class='table table-bordered'>" +
                    "<thead>" +
                        "<tr class='text-center'>" +
                            "<th style='width:150px' class='col-1'>Domingo</th>" +
                            "<th style='width:150px' class='col-1'>Segunda</th>" +
                            "<th style='width:150px' class='col-1'>Terça</th>" +
                            "<th style='width:150px' class='col-1'>Quarta</th>" +
                            "<th style='width:150px' class='col-1'>Quinta</th>" +
                            "<th style='width:150px' class='col-1'>Sexta</th>" +
                            "<th style='width:150px' class='col-1'>Sábado</th>" +
                        "</tr>" +
                    "</thead>" +
                    "<tbody>";
            primeiro_dia = new Date(ano.toString() + "-" + (mes + 1).toString() + "-01"); // Primeiro dia do mês
            primeiro_dia_semana = primeiro_dia.getDay() + 1; // Dia da semana em que caiu o primeiro dia do mes (+1 porque segunda é 0)
            semana = dia = 1 //contadores
            inicio = false;

            for (i = 1; i <= 42; i++) {
                if (semana == 1) txt += "<tr>"
                if (semana == primeiro_dia_semana) { // coloca campos vazios até chegar no dia 1 da semana
                    inicio = true
                }
                if (dia > limit_dias[mes]) {
                    inicio = false
                }
                if (inicio) {
                    dia_selecionado = data.getDate()
                    ano_selecionado = data.getFullYear()
                    colorirSelecionado = (dia_selecionado == dia) && (ano_selecionado == ano) ? "table-warning" : ""
                    colorirFimDeSemana = ((dia_selecionado != dia) && ((semana == 1) || (semana == 7))) ? "background-color: rgb(245,245,245);" : ""
                    txt += 
                        "<td style='max-width:150px;"+ colorirFimDeSemana +"' align=center height='150' onclick='gerarCalendario(\""+ ano + "-"+ (mes + 1) + "-" + dia +"\")' >"+ 
                            ((dia == hoje.getDate() && mes == hoje.getMonth() && ano == hoje.getFullYear())? '<span class="text-primary">' + dia + '</span>': dia  )+ // colore o dia de hoje
                            "<br>"

                    dados.forEach(php => {
                        phpData = php.data.split(' ')[0]
                        phpDia = phpData.split('-')[2]
                        phpMes = phpData.split('-')[1]
                        phpAno = phpData.split('-')[0]
                        phpData = php.data.split(' ')[1]
                        phpHora = phpData.split(':')[0]
                        phpMin = phpData.split(':')[1]
                        phpSeg = phpData.split(':')[2]
                        if(data.getFullYear() == phpAno && ((data.getMonth()+1)<10?'0'+(data.getMonth()+1):(data.getMonth()+1)) == phpMes && (dia < 10 ? '0'+dia : dia) == phpDia){
                            txt += '<span class="badge bg-secondary w-100" style="cursor:pointer">'+php.obs+' ás '+ phpHora + ':' + phpMin +'</span>'
                        }
                    });

                    txt += "</td>"


                    dia++
                } else {
                    txt += "<td style='border:none'></td>"
                }
                semana++
                if (semana == 8) {
                    semana = 1;
                    txt += "</tr>"
                }
            }  
            txt += "<tbody></table></div>"
            $('#calendario').html(txt)
        }
    </script>
@endsection
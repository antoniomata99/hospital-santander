<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agendar cita</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    <form action="" method="">
        @csrf
        <div class="columns is-mobile is-centered is-vcentered">
            <div class="column is-7 is-centered">
                {{-- <h1 class="title is-1">{{$id_usuario}}</h1> --}}
                <div class="field">
                    <label class="label">Especialidad</label>
                    <div class="control">
                      <div class="select">
                        <select name="sel_esp" id="sel_esp">
                          <option value="">Selecciona una especialidad</option>
                          @foreach ($especialidades as $especialidad)
                            <option values="{{$especialidad->nombre}}">{{$especialidad->nombre}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Médico</label>
                    <div class="control">
                      <div class="select" name="medico" >
                        <select id="sel_med">
                          <option value="">Selecciona un médico</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Fecha</label>
                    <div class="control">
                        <input id="fechaSelect" class="input" type="date">
                    </div>
                </div>

                <div class="field">
                    <h6 class="title is-6">Hora(s) disponible(s)</h6>
                    <span id="contenidoHorario">
                        <div class="box">
                            <label class="radio">
                                <input value="" type="radio" name="">
                                5:00 PM
                            </label>
                        </div>
                    </span>
                </div>

                <div class="field">
                    <input id="crearCita" type="button" class="button is-primary is-light modal-trigger" data-modal="testa" value="Registrar cita">
                    <input type="submit" class="button is-info is-light" value="Regresar">
                    <div class="modal" data-modal="testa">
                        <div class="modal-background"></div>
                        <div class="modal-content">
                            <div class="box">Cita registrada!</div>
                        </div>
                        <button class="modal-close is-large" aria-label="close"></button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
<script>
$( document ).ready(function() {

    var especialidadS= "";
    var medicoS="";
    var fechaS="";

    $('#sel_esp').change(function(){

        const valor = $(this).val();
        console.log(valor);
        console.log(valor.length);

        if(valor != ""){
            especialidadS = valor;
            var op = ' ';
            var div = $(this).parent();
        $.ajax({
            url: '/request',
            type: "GET",
            data:{
                'especialidadNombre' : valor // in header request I'm getting value [productName: plastic product] *
            }
        }).done(function(response){
            //console.log(response);
            //var arrayString = JSON.stringify(response)
            //var array = JSON.parse(arrayString);
            console.log('Longitud respuesta'+response.length);

            if(response.length <=0){
            $('#sel_med').empty('#sel_med').find('option').remove()
                .end()
                .append('<option value="">Selecciona una especialidad</option>')
                .val('');
        }


            for (var i = 0; i < response.length; i++){
                    op += '<option>'+response[i]+'</option>';

                }
                console.log(op);
                $('#sel_med').append(op);
        });

        }

    })

    $('#sel_med').change(function(){
        const valor = $(this).val();

        if(valor != ""){
            medicoS=valor;
        }

    })


    $('#fechaSelect').change(function(){
        console.log('fechaselect Medico seleccionado: '+ medicoS);
        console.log('Fecha seleccionada: '+$(this).val());
        const valor = $(this).val();
        if(valor != ""){
            fechaS = valor;
            var op = ' ';
            var div = $(this).parent();
        $.ajax({
            url: '/solicitarFechas',
            type: "GET",
            data:{
                'nombreMedico' : medicoS,
                'fechaHorario' : fechaS
            }
        }).done(function(response){
            //console.log(response);
            //var arrayString = JSON.stringify(response)
            //var array = JSON.parse(arrayString);
            console.log(response);
            console.log('Longitud respuesta fecha select'+response.length);

            var len = 0;
             if(response['data'] != null){
                len = response['data'].length;
             }

             console.log('longitud'+len);

            if(len > 0){
                for (var i = 0; i < response.len; i++){
                    var id_horario = response['data'][i].id_horario;
                    var hora_inicio = response['data'][i].hora_inicio;

                    $('#contenidoHorario').html('<div class="box">\
                <label class="radio">\
                    <input type="radio" name="answer">\
                    10:00 PM\
                </label>\
            </div>');
                }

            }

        });

       }

    })

    $('').click(function(){
        const data = $('#formCrearCita').serializeArray();
        data.push({
            name:'id_paciente',
            value: "{{$id_usuario}}"
        })
        console.log(data);
        window.location.href="/";
    })




    //const submitButton = document.querySelector('#submit-button')
});



</script>
</html>

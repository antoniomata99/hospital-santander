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
                          <option>Selecciona una especialidad</option>
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
                          <option value="0">Selecciona un médico</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Fecha</label>
                    <div class="control">
                        <input class="input" type="date">
                    </div>
                </div>

                <div class="field">
                    <h6 class="title is-6">Hora(s) disponible(s)</h6>
                    <div class="box">
                        <label class="radio">
                            <input type="radio" name="answer">
                            5:00 PM
                        </label>
                    </div>
                </div>

                <div class="field">
                    <input type="submit" class="button is-primary is-light modal-trigger" data-modal="testa" value="Registrar cita">
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

        especialidadNombre = $('#sel_esp').val(); // Here, I'm getting selected value of dropdown
        var op = ' ';
        var div = $(this).parent();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/request',
            type: "GET",
            data:{
                _token:$('input[name="_token"]').val(),
                'especialidadNombre' : especialidadNombre // in header request I'm getting value [productName: plastic product] *
            }
        }).done(function(response){
            //console.log(response);
            //var arrayString = JSON.stringify(response)
            //var array = JSON.parse(arrayString);
            console.log(response);


            for (var i = 0; i < response.length; i++){
                    op += '<option>'+response[i]+'</option>';

                }
                console.log(op);
                $('#sel_med').append(op);


        });




    //const submitButton = document.querySelector('#submit-button')
});



</script>
</html>

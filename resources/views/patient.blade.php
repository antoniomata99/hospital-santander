<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/patient.css') }}" rel="stylesheet">
</head>
<body>
    <form action="{{url('/patient')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="columns is-mobile is-centered is-vcentered">
            <div class="column is-7">
                <h3 class="title has-text-centered">Hospital Santander</h3>
                {{-- Desplegar mensaje de que no tiene remisión--}}
                @if(Session::has('mensaje'))
                <div class="notification is-danger is-light">
                    <button class="delete"></button>
                    {{Session::get('mensaje')}}
                </div>
                @endif
            </div>
        </div>
        <div class="columns is-mobile is-centered is-vcentered">
            <div class="column is-7">
                <div class="field">
                    <label class="label">Tipo Documento</label>
                    <div class="control">
                        <div class="select">
                        <select name="tipo_documento">
                            <option>Seleccione una opción</option>
                            <option value="CC">CC</option>
                            <option value="TI">TI</option>
                            <option value="CE">CE</option>
                        </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Numero documento</label>
                    <div class="control">
                      <input class="input" type="text" placeholder="Text input" name="numero_documento">
                    </div>
                </div>
                <div class="field">
                    <button class="button is-primary">Realizar consulta</button>
                </div>
            </div>

        </div>

    </form>
</body>
<script>
//Script para cerrar la notificación usando vanilla JavaScript.
document.addEventListener('DOMContentLoaded', () => {
    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
        const $notification = $delete.parentNode;

        $delete.addEventListener('click', () => {
            $notification.parentNode.removeChild($notification);
        });
    });
});
</script>
</html>



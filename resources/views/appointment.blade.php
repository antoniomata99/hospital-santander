<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agendar cita</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <form action="" method="">
        @csrf
        <div class="columns is-mobile is-centered is-vcentered">
            <div class="column is-7 is-centered">
                <div class="field">
                    <label class="label">Especialidad</label>
                    <div class="control">
                      <div class="select">
                        <select>
                          <option>Selecciona una especialidad</option>
                          @foreach ($results as $result)
                            <option>{{$result->nombre}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Médico</label>
                    <div class="control">
                      <div class="select">
                        <select>
                          <option>Selecciona un médico</option>
                          <option>Dr. Gregory House</option>
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
    function handleModals() {
  var modalTriggers = document.querySelectorAll(".modal-trigger");
  for (i = 0; i < modalTriggers.length; i++) {
    modalTriggers[i].addEventListener("click", function () {
      var target = this.dataset.modal;
      console.log(target);
      var targetContent = document.querySelector(
        '.modal[data-modal="' + target + '"]'
      );
      targetContent.classList.add("is-active");
    });
  }
  var modelClose = document.querySelectorAll(".modal-background,.modal-close");
  for (i = 0; i < modelClose.length; i++) {
    modelClose[i].addEventListener("click", function () {
      var parentModal = this.closest(".modal");
      parentModal.classList.remove("is-active");
    });
  }
}
handleModals();

</script>
</html>

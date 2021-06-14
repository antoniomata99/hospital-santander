<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                          <option>Selecciones una Especialidad</option>
                          <option>Cancer</option>
                        </select>
                      </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Médico</label>
                    <div class="control">
                      <div class="select">
                        <select>
                          <option>Selecciones un médico</option>
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
                    <div class="box">
                        <div class="field">
                            <label class="radio">
                                <input type="radio" name="answer">
                            </label>
                        </div>
                        <div class="field">
                            <label class="label">Fecha</label>
                            <div class="control">
                              <input class="input" type="text" placeholder="Text input">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Hora Inicio</label>
                            <div class="control">
                              <input class="input" type="text" placeholder="Text input">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Hora Fin</label>
                            <div class="control">
                              <input class="input" type="text" placeholder="Text input">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <input type="submit" class="button modal-trigger" data-modal="testa" value="Registrar cita">
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

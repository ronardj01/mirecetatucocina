<fieldset class="border border-4 p-3 mb-3">
  <legend class="fs-3 col-5 text-center mb-3 fw-bold">Nivel de la Receta</legend>
  <div class="my-3 fs-5 d-flex">
    <div>
      <label for="porciones">Porciones</label>
      <input type="number" class="col-2 ms-2 rounded-2" name="porciones" id="porciones" autocomplete="off">
    </div>
    <div>
      <label for="tiempo">Tiempo</label>
      <input type="number" class="col-2 ms-2 rounded-2" name="tiempo" id="tiempo" autocomplete="off">
    </div>
  </div>
  <div class="form-check form-check-inline fs-5">
    <input class="form-check-input" type="radio" name="dificultad" id="facil" value="Fácil">
    <label class="form-check-label" for="facil">Fácil</label>
  </div>
  <div class="form-check form-check-inline fs-5">
    <input class="form-check-input" type="radio" name="dificultad" id="media" value="Media">
    <label class="form-check-label" for="media">Media</label>
  </div>
  <div class="form-check form-check-inline fs-5">
    <input class="form-check-input" type="radio" name="dificultad" id="dificil" value="Difícil">
    <label class="form-check-label" for="dificil">Difícil</label>
  </div>
</fieldset>
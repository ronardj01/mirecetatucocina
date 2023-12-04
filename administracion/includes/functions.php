<?php 
  function secure() {
    if(!isset($_SESSION['password'])){
      echo '<h1 class="display-6">Debes estar logeado para ver esta página</h1>';
      die();
    }
  }

  function set_message($message) {
    { 
      $_SESSION['message'] = $message;
    }
  }

  function get_message() {
    if( isset($_SESSION['message']) ) {
      echo '<p class="get_message">' . $_SESSION['message'] . '</p> <hr>';
      unset($_SESSION['message']);
    }}

    function mostrar_eliminarForm($action, $nombre) {
      return  <<<FORM
      <form action=$action method='POST' autocomplete='off'>
        <div class='mb-3'>
          <label for="nombreReceta" class="form-label">Para confirmar la eliminación de la receta, debes escribir el nombre exacto. Como aparece aquí [ <b>$nombre</b> ]
          </label>
          <input type="text" class="form-control fs-5" id="nombreReceta" name="nombreReceta" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-danger elminarReceta">Eliminar Receta</button>
      </form>
    FORM;
    }

?>
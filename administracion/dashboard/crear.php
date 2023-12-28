<?php
$active_crear = true;
require_once("../includes/head.php");
?>

<body>
  <?php
  session_start();
  require_once("../includes/functions.php");
  secure();
  include_once("../includes/header.php");
  ?>

  <main class="container mt-5">
    <?php include_once("../includes/titulo.php") ?>
    <div class="row justify-content-center mt-3">
      <div class="col-md-5 col-lg-10">
        <form action="procesaCrear.php" method="POST" autocomplete="off" class="justify-content-center border border-5 p-5 mb-5">
          <div class="mb-3">
            <label for="nombre" class="form-label fs-4 fw-bold">Nombre de la Receta</label>
            <input type="text" class="form-control form-control-lg border-4" id="nombre" name="nombre">
          </div>
          <?php include_once("../includes/categoriasFieldset.php") ?>
          <?php include_once("../includes/nivelFieldset.php") ?>
          <?php include_once("../includes/descripcionFieldset.php") ?>
          <?php include_once("../includes/mediaFieldset.php") ?>

          <div>
            <label for="preparacion" class="form-label fs-4">Preparación</label>
            <textarea class="form-control" name="preparacion" id="preparacion"></textarea>
          </div>
          <button class="btn btn-primary fs-4 my-4 px-5">Crear</button>
        </form>
      </div>
    </div>
  </main>


  <!-- Codigo de tinyMCE -->
  <script src="https://cdn.tiny.cloud/1/xqevf8s5xn72jwi9y8cqyzswycano32ntkyn7jlryfqfdk8v/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#preparacion',
      placeholder: 'Escribe aquí la preparación de la receta.'
    });
  </script>
</body>

</html>
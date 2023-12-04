<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ELIMINAR | DASHBOARD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../../img/logo/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/estilosAdmin.css">
</head>

<body>
  <?php
  session_start();
  require_once("../includes/functions.php");
  secure();
  $active_eliminar = true;
  include_once("../includes/header.php");
  if (isset($_GET['rec']) && isset($_GET['nombre']) && isset($_GET['imagen'])) {
    $idreceta = $_GET['rec'];
    $nombre = $_GET['nombre'];
    $imagen = $_GET['imagen'];
  }
  ?>

  <main class="container mt-5">
    <?php include_once("../includes/titulo.php") ?>

    <div class="row row-cols-1 row-cols-md-3 g-5 justify-content-center align-items-center mt-3">
      <div class='col'>
        <div class="card">
          <img src="../../img/<?php echo $imagen ?>" class="card-img-top" alt="<?php echo $nombre ?>">
        </div>
        <div class="card-body elminarReceta">
          <h3 class="card-title text-center pt-4">
            <?php echo $nombre ?>
          </h3>
        </div>
      </div>
      <div class="col col-md-3 col-lg-4">
        <?php
        /* Procesamiento del formulario */
        $action = htmlspecialchars($_SERVER["PHP_SELF"]) . '?rec=' . urlencode($idreceta) . '&nombre=' . urlencode($nombre) . '&imagen=' . urlencode($imagen);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (isset($_POST["nombreReceta"])) {
            $nombreReceta = $_POST["nombreReceta"];
            if ($nombreReceta === $nombre) {
              echo 'Corfimación correcta';
            } else {
              echo '<p class="elminarReceta">El <b>nombre</b> introducido es <b>incorrecto</b>. Si deseas eliminar la receta introduce el nombre correcto.</p>';
              echo mostrar_eliminarForm($action, $nombre);
            }
          } else {
            echo 'Error al enviar el formulario';
          }
        } else { // Solo mostrar formulrio si no se ha enviado
          echo '<p class="elminarReceta">Estas a punto de eliminar esta receta permanentemente</p>';
          echo mostrar_eliminarForm($action, $nombre);
        }
        ?>
      </div>
    </div>
  </main>
</body>

</html>
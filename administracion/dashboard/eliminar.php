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
    $id_receta = $_GET['rec'];
    $nombre = $_GET['nombre'];
    $imagen = $_GET['imagen'];
  }
  ?>

  <main class="container mt-5">
    <?php include_once("../includes/titulo.php") ?>

    <div class="row row-cols-1 row-cols-md-5">
      <div class='col'>
        <div class="card">
          <img src="../../img/<?php echo $imagen ?>" class="card-img-top" alt="<?php echo $nombre ?>">
        </div>
        <div class="card-body">
          <h5 class="card-title text-center pt-4">
            <?php echo $nombre ?>
          </h5>
          <p class="card-text text-center py-2">Estas a punto de elminar esta receta permanentemente</p>
        </div>
      </div>
      <div class="col col-md-5 col-lg-4">
        <form action="#" method="post" autocomplete="off">
          <div class="mb-3">
            <label for="nombreReceta" class="form-label">Escriba el nombre de la receta</label>
            <input type="text" class="form-control fs-5" id="nombreReceta" name="nombreReceta" autocomplete="off">
          </div>
          <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
      </div>
    </div>
  </main>
</body>

</html>
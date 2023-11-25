<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DASHBOARD | ADMIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../../img/logo/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../css/estilosAdmin.css">
</head>

<body>
  <?php
  session_start();
  require_once("../includes/functions.php");
  secure();
  $active_home = true;
  include_once("../includes/header.php");
  ?>

  <main class="container mt-5">
    <?php include_once("../includes/titulo.php") ?>
    <div class="container d-flex justify-content-center mt-3">
      <h2>Administración de Recetas</h2>
    </div>
    <div class="table-responsive">
      <table class="table table-hover mt-3">
          <thead>
            <tr class="table-active">
              <th scope="col" class="fs-4">Receta</th>
              <th scope="col" class="fs-4">Categorias</th>
              <th scope="col" class="fs-4">Subcategorias</th>
              <th scope="col" class="fs-4">IDreceta</th>
              <th scope="col" class="fs-4 text-center">Editar</th>
              <th scope="col" class="fs-4 text-center">Eliminar</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="fs-5">Rollos de pescado y caviar</td>
              <td class="fs-6">Pescados</td>
              <td class="fs-6">Pescados</td>
              <td class="fs-5">1</td>
              <td class="fs-5 text-center"><a href="editar.php"><i class="bi bi-pencil"></i></a></td>
              <td class="text-center"><a href="eliminar.php"><i class="bi bi-trash"></i></a></td>
            </tr>
          </tbody>
      </table>
    </div>
  </main>
</body>

</html>
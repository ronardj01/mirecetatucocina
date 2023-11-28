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
  /* Traer las funciones */
  require_once("../includes/functions.php");
  secure();

  /* Crear conexion con la base de datos */
  require_once("../../connexio/connexio.php");

  /* Cargar el titulo */
  $active_home = true;
  include_once("../includes/header.php");
  ?>

  <main class="container mt-5">
    <?php
    /* Cargar el titulo */
    include_once("../includes/titulo.php")
      ?>
    <div class="container d-flex justify-content-center mt-3">
      <h2>Administración de Recetas</h2>
    </div>
    <?php
    /* Parametros para paginación */
    $rectasPorPagina = 1;

    /* Determinar pagina actual para buscar en la url */
    if (isset($_GET['pagina'])) {
      $pagina = $_GET['pagina'];
    } else {
      $pagina = 1;
    }
    ;
    $inicio = ($pagina - 1) * $rectasPorPagina;

    /* Consultar el numero total de recetas en la base de datos */
    $sql_recetas = $conexion->prepare('SELECT COUNT(*) as total FROM recetas');
    $sql_recetas->execute();
    $total = $sql_recetas->get_result();
    $totalRecetas = $total->fetch_assoc();
    $sql_recetas->close();

    /* Calcular el numero total de páginas*/
    $total_paginas = ceil($totalRecetas['total'] / $rectasPorPagina);

    if ($stm = $conexion->prepare('SELECT * FROM recetas ORDER BY fechapublicacion DESC LIMIT ?, ?')) {
      $stm->bind_param('ss', $inicio, $rectasPorPagina);
      $stm->execute();

      $result = $stm->get_result();
      $resultNumber = $result->num_rows;

      if ($resultNumber > 0) {
        ?>
        <h4>Total de recetas:
          <?php echo $totalRecetas['total'] ?>
        </h4>
        <div class="row row-cols-1 row-cols-md-5 gx-4 gy-5">
          <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col">
              <div class="card my-2 h-100">
                <img src="../../img/<?php echo $row['imagen1'] ?>" class="card-img-top" alt="<?php echo $row['nombre'] ?>">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo $row['nombre'] ?>
                  </h5>
                  <p class="card-text text-center"><b>Fecha</b>:
                    <?php echo $row['fechapublicacion'] ?>
                  </p>
                </div>
                <div class="card-footer d-flex justify-content-between py-3">
                  <a href="editar.php?rec=<?php echo $row['idreceta'] ?>"><i class="bi bi-pencil">Editar</i></a>
                  <a href="eliminar.php?rec=<?php echo $row['idreceta'] ?>"><i
                      class="bi bi-trash text-danger">Eliminar</i></a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

      <?php } else {
        echo 'No se encontraron recetas';
      }
      $stm->close();
      ?>

    <?php } else {
      echo 'No es posible preparar el statement';
    }
    ?>
    <nav aria-label="Page navigation example">
      <ul class="pagination pagination-lg justify-content-center mt-5 mb-5">
        <?php if ($pagina > 1) { ?>
          <li class="page-item">
            <a class="page-link" href="dashboard.php?pagina=<?php echo $pagina - 1 ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
        <?php } ?>
        <?php for ($i = 1; $i <= $total_paginas; $i++) {
          if ($i == $pagina) {
            echo "<li class='page-item active'><a class='page-link' href='dashboard.php?pagina=" . $i . "'>" . $i . "</a></li>";
          } else {
            echo "<li class='page-item'><a class='page-link' href='dashboard.php?pagina=" . $i . "'>" . $i . "</a></li>";
          }
        }
        if ($pagina < $total_paginas) { ?>
          <li class="page-item">
            <a class="page-link" href="dashboard.php?pagina=<?php echo $pagina + 1 ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
  </main>
</body>

</html>
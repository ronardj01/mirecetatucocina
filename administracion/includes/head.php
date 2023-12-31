<!DOCTYPE html>
<html lang="es">
<?php
if ($active_home) {
  $page_title = 'DASHBOARD';
}
if ($active_crear) {
  $page_title = 'CREAR';
}
if ($active_editar) {
  $page_title = 'EDITAR';
}
if ($active_eliminar) {
  $page_title = 'ELIMINAR';
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $page_title ?> | ADMIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../../img/logo/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/estilosAdmin.css">
</head>
<?php
$h1Contenido;
if ($active_home) {
  $h1Contenido = "Dashboard";
} else if ($active_crear) {
  $h1Contenido = "Crear Nueva Receta";
} else if ($active_editar) {
  $h1Contenido = "Editar Receta";
} else {
  $h1Contenido = "Eliminar Receta";
}
?>
<div class="d-flex justify-content-center">
  <h1 class="display-4">
    <?php echo $h1Contenido; ?>
  </h1>
</div>
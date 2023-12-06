<?php
$active_eliminar = true;
require_once("../includes/head.php");
require_once("../../connexio/connexio.php");
?>

<body>
  <?php
  session_start();
  require_once("../includes/functions.php");
  secure();
  include_once("../includes/header.php");
  if(isset($_GET['rec']) && isset($_GET['nombre']) && isset($_GET['imagen'])) {
    $idreceta = $_GET['rec'];
    $nombre = $_GET['nombre'];
    $imagen = $_GET['imagen'];
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
          $action = htmlspecialchars($_SERVER["PHP_SELF"]).'?rec='.urlencode($idreceta).'&nombre='.urlencode($nombre).'&imagen='.urlencode($imagen);
          if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["nombreReceta"])) {
              $nombreReceta = $_POST["nombreReceta"];
              if($nombreReceta === $nombre) {
                /* Conectar con base de datos y borrar receta en caso de escribir nombre correcto*/
                if($stm = $conexion->prepare('DELETE recetas, ingredientes FROM recetas LEFT JOIN ingredientes ON recetas.idreceta = ingredientes.idreceta WHERE recetas.idreceta = ?')) {
                  $stm->bind_param('s', $idreceta);
                  $stm->execute();
                  $stm->close();
                  echo '<h3>Esta receta se ha eliminado</h3>';
                }
              } else { // Warning debe escribir nombre correcto
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
  <?php } else { ?>
    <div class="container mt-5">
      <form class="row g-3 justify-content-center" method="POST"
        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="col-4">
          <label for="buscarReceta" class="visually-hidden">Buscar Receta</label>
          <input type="text" class="form-control" id="buscarReceta" name="buscarReceta"
            placeholder="Introduce el nombre de una receta">
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
        </div>
      </form>
    </div>
    <?php
    if(isset($_POST["buscarReceta"])) {
      $buscarReceta = $_POST["buscarReceta"];
      if($stm = $conexion->prepare("SELECT * FROM recetas WHERE nombre = ?")) {
        $stm->bind_param("s", $buscarReceta);
        $stm->execute();
        $result = $stm->get_result();
        $receta = $result->fetch_assoc();
        if($result->num_rows > 0) {
          var_dump($result->num_rows);
        } else {
          echo "<h4 class='text-center mt-4'>La receta buscada no existe.</h4>";
        }
      }
    }
  } ?>
</body>

</html>
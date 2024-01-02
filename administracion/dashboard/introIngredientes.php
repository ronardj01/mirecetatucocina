<?php
$page_title = 'INGREDIENTES';
require_once("../includes/head.php");
?>

<body>
  <?php
  session_start();
  /* Traer las funciones */
  require_once("../includes/functions.php");
  secure();
  require_once("../includes/header.php");
  ?>
  <main class='container'>
    <div class="d-flex justify-content-center mt-4">
      <h1 class="display-4">Introducir ingredientes</h1>
    </div>
    <div class="row justify-content-center mt-3">
      <div class="col-md-5 col-lg-8">
        <?php $action = htmlspecialchars($_SERVER[ "PHP_SELF" ]); ?>
        <form action="<?php echo $action ?>" method="POST" autocomplete="off"
          class="justify-content-center border border-5 p-5 mb-5" id="formIngredientes">
          <div class="mb-3">
            <label for="ingrediente1" class="form-label fs-4 fw-bold">Ingrediente 1</label>
            <input type="text" class="form-control form-control-lg border-4" id="ingrediente1" name="ingredientes[]">
          </div>
          <div class="mb-3">
            <label for="ingrediente2" class="form-label fs-4 fw-bold">Ingrediente 2</label>
            <input type="text" class="form-control form-control-lg border-4" id="ingrediente2" name="ingredientes[]">
          </div>
          <div class="mb-3">
            <label for="ingrediente3" class="form-label fs-4 fw-bold">Ingrediente 3</label>
            <input type="text" class="form-control form-control-lg border-4" id="ingrediente3" name="ingredientes[]">
          </div>
          <button type="button" id="btnMas"><i class="bi bi-plus"></i> Ingredientes</button>
          <button class="btn btn-primary fs-4 my-4 px-5"><i class="bi bi-floppy"></i> Guardar</button>
        </form>
      </div>
    </div>
  </main>
  <script>
    const btnMas = document.querySelector('#btnMas');
    let inputNumber = 3;

    btnMas.addEventListener('click', e => {
      inputNumber++;
      btnMas.insertAdjacentHTML("beforebegin",
        `<div class="mb-3">
            <label for="ingrediente${inputNumber}" class="form-label fs-4 fw-bold">Ingrediente ${inputNumber}</label>
            <input type="text" class="form-control form-control-lg border-4" id="ingrediente${inputNumber}" name="ingredientes[]">
          </div>`
      )
    })
  </script>
</body>

</html>
<?php
/* Procesar el formulario de los ingredientes */
if (isset($_POST[ "ingredientes" ])) {
  $ingredientes = $_POST[ "ingredientes" ];

  $idreceta = 20;

  /* Crear conexion con la base de datos */
  require_once("../../connexio/connexio.php");

  foreach ($ingredientes as $ingrediente) {
    $stm = $conexion->prepare('INSERT INTO ingredientes (idreceta, ingrediente) VALUES (?, ?)');
    $stm->bind_param('ss', $idreceta, $ingrediente);
    $stm->execute();
  }
  $stm->close();
}
?>
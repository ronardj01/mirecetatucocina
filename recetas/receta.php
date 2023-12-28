<?php
if (isset($_GET['rec'])) {
  $idreceta = $_GET['rec'];
}
require_once('../connexio/connexio.php');
// Hacemos una consulta a la base de datos
mysqli_select_db($conexion, $database);

// Query para obtener la receta especifíca
$query_receta = 'SELECT * FROM  recetas WHERE idreceta = ' . $idreceta;
$receta = mysqli_query($conexion, $query_receta);
$row_receta = mysqli_fetch_assoc($receta);

// Query para obtener los ingredientes de la receta
$query_ingredientes = 'SELECT ingrediente FROM ingredientes WHERE idreceta = ' . $idreceta;
$ingredientes = mysqli_query($conexion, $query_ingredientes);
$row_ingredientes = mysqli_fetch_assoc($ingredientes);

// Query para obtner categorias
$query_categorias = 'SELECT * FROM recetascategorias rc INNER JOIN categorias c ON rc.idcategoria = c.idcategoria WHERE rc.idreceta = ' .$idreceta;
$categorias = mysqli_query($conexion, $query_categorias);
$row_categorias = mysqli_fetch_assoc($categorias);
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="auhor" content="Ronar Eusebio">
  <meta name="description" content="Recetas deliciosas y exquisitas fáciles de hacer y en poco tiempo. Cocina de todo el mundo con recetas para todos, carnes, pescados, postres y también preparaciones veganas y saludables.">
  <title>Receta | Rollos de pescado y caviar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="shortcut icon" href="../img/logo/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../css/cookieconsent.min.css">
  <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
  <div class="content">
    <header>
      <a href="../index.php"><img src="../img/logo/logo.svg" alt="gorro cocinero con espatula y batidor" height="100" width="100" id="prueba"></a>
      <div class="soloMovil">
        <p>Selecciona una Página</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" onclick="toggleNavbarSlideDown()">
          <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
      </div>
      <ul class="navbar slideDown">
        <li><a href="../index.php">Inicio</a></li>
        <li><a href="recetas.php">Recetas</a></li>
        <li><a href="../nosotros.html">Sobre Nosotros</a></li>
        <li><a href="../contacto.html">Contactanos</a></li>
      </ul>
    </header>
  </div>
  <main class="content">
    <section id="encabezadoReceta" class="paginaReceta">
      <div>
        <h1><?php echo $row_receta['nombre'] ?></h1>
        <ul>
          <li><i class="fa-solid fa-users"></i><b> :</b> <?php echo $row_receta['porciones'] ?></i></li>
          <li><i class="fa-solid fa-hourglass-half"></i><b> :</b> <?php echo $row_receta['tiempo'] ?> minutos</li>
          <li><i class="fa-solid fa-person-digging"></i><b> :</b> <?php echo $row_receta['dificultad'] ?></li>
        </ul>
      </div>
      <img src="../img/<?php echo $row_receta['imagen1'] ?>" alt="" width="620" height="500">
    </section>

    <section id="ingredientes" class="pescados paginaReceta">
      <h2>Ingredientes</h2>
      <ul>
        <?php do { ?>
          <li><?php echo $row_ingredientes['ingrediente'] ?></li>
        <?php } while ($row_ingredientes = mysqli_fetch_assoc($ingredientes)) ?>
      </ul>

      <!-- Agregar boton para mostrar ingredientes en formato todolist-->
      <div>

      </div>
    </section>
    <section id="preparacion" class="paginaReceta">
      <h2>Preparación</h2>
      <div class="pasos">
        <?php
        $pasos = explode('</p>', $row_receta['preparacion']);
        array_pop($pasos); // Eliminar el ultimo elemento del array que estaria vacio.
          /* VALORAR CAMBIAR PASOS A TABLA NUEVA COMO TABLA INGREDIENTES */
        $counter = 1;

        foreach ($pasos as &$paso) {
          echo <<<PASOS
          <div>
          <h3>Paso $counter</h3>
          $paso
          </div>

          PASOS;
          $counter++;
        }
        ?>
      </div>

      <!-- Agregar sugerencias para acompañar -->
    </section>
    <!-- Esto es una prueba para obtener categorias *********PRUEBA -->
    <!-- <ul>
        <?php do { ?>
          <li><?php echo $row_categorias['categoria'] ?></li>
        <?php } while ($row_categorias = mysqli_fetch_assoc($categorias)) ?>
      </ul> -->
  </main>
  <footer>
    <p>&copy; <span id="year"></span> todos los derechos reservados.</p>
    <ul>
      <li><a href="../legal/politica-privacidad.html">Aviso legal y políticas de privacidad</a></li>
      <li><a href="../legal/politica-cookies.html">Política de cookies</a></li>
    </ul>
    <div class="social">
      <a href="">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
        </svg>
      </a>
      <a href="">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
        </svg>
      </a>
      <a href="">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
          <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
        </svg>
      </a>
      <a href="">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
          <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
        </svg>
      </a>
    </div>
  </footer>
  <script src="../js/cookiesConsent/cookieconsent.min.js"></script>
  <script src="../js/cookiesConsent/cookies.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>
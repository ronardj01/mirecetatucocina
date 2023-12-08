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
    <form action="#" method="POST" autocomplete="off">
    <textarea name="preparacion" id="preparacion">Hello, World!</textarea>
  </form>
  </main>
 

  <!-- Codigo de tinyMCE -->
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#preparacion'
    });
  </script>
</body>

</html>
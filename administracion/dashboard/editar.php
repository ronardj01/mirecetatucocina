<?php
$active_editar = true;
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
  </main>
</body>

</html>
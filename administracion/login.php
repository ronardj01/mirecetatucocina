<?php
session_start();
require_once("../connexio/connexio.php");
include("includes/functions.php");

if (isset($_POST['username'])) {
  if ($stm = $conexion->prepare('SELECT * FROM validacion WHERE usuario = ? AND password = ?')) {
    $hashedPassw = SHA1($_POST['password']);
    $stm->bind_param('ss', $_POST['username'], $hashedPassw);
    $stm->execute();

    $result = $stm->get_result();
    $validar = $result->fetch_assoc();

    if ($validar) {
      $_SESSION['idvalidacion'] = $validar['idvalidacion'];
      $_SESSION['usuario'] = $validar['usuario'];
      $_SESSION['password'] = $validar['password'];

      set_message($_SESSION['usuario'] . ". Estas correctamente autenticado");
      header('Location:dashboard/dashboard.php');
      die();
    } else {
      echo 'El usuario o la contraseña no es valida';
    }
    $stm->close();
  } else {
    echo 'no fue posible preparar el statement!!';
  }
}
?>

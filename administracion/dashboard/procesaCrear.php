<?php 
if (isset($_POST["nombre"])) {
  $nombre = $_POST["nombre"];
}
//Categorias
if (isset($_POST["categoria"])) {
  $categoria = $_POST["categoria"];
}

//subCategorias
if (isset($_POST["pollo"])) {
  $pollo = $_POST["pollo"];
}
if (isset($_POST["ternera"])) {
  $ternera = $_POST["ternera"];
}
if (isset($_POST["cerdo"])) {
  $cerdo = $_POST["cerdo"];
}
if (isset($_POST["cordero"])) {
  $cordero = $_POST["cordero"];
}
if (isset($_POST["cabra"])) {
  $cabra = $_POST["cabra"];
}
if (isset($_POST["pavo"])) {
  $pavo = $_POST["pavo"];
}
if (isset($_POST["pato"])) {
  $pato = $_POST["pato"];
}
if (isset($_POST["guinea"])) {
  $guinea = $_POST["guinea"];
}
if (isset($_POST["conejo"])) {
  $conejo = $_POST["conejo"];
}
if (isset($_POST["fria"])) {
  $fria = $_POST["fria"];
}
if (isset($_POST["caliente"])) {
  $caliente = $_POST["caliente"];
}
//Nivel de la receta
if (isset($_POST["porciones"])) {
  $porciones = $_POST["porciones"];
}
if (isset($_POST["tiempo"])) {
  $tiempo = $_POST["tiempo"];
}
if (isset($_POST["dificultad"])) {
  $difilcutad = $_POST["dificultad"];
}
//Descripciones
if (isset($_POST["Dcorta"])) {
  $Dcorta = $_POST["Dcorta"];
}
if (isset($_POST["Dlarga"])) {
  $Dlarga = $_POST["Dlarga"];
}
//Media video imagen name
if (isset($_POST["video"])) {
  $video = $_POST["video"];
}
if (isset($_POST["imagen1"])) {
  $imagen1 = $_POST["imagen1"];
}
if (isset($_POST["imagen2"])) {
  $imagen2 = $_POST["imagen2"];
}
if (isset($_POST["imagen3"])) {
  $imagen3 = $_POST["imagen3"];
}
//Preparación
if (isset($_POST["preparacion"])) {
  $preparacion = $_POST["preparacion"];
}

 /* Crear conexion con la base de datos */
 require_once("../../connexio/connexio.php");

 if($sql_receta= $conexion->prepare('INSERT INTO recetas (nombre, porciones, tiempo, dificultad, descripcioncorta, descripcion, video, imagen1, imagen2, imagen3, preparacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
  $sql_receta->bind_param('sssssssssss', $nombre, $porciones, $tiempo, $difilcutad, $Dcorta, $Dlarga, $video, $imagen1, $imagen2, $imagen3, $preparacion);
  $sql_receta->execute();
  $sql_receta->close();
 } else {
  echo 'No es posible preparar el statement';
 }
?>
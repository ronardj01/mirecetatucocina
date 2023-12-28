<?php 
if (isset($_POST["nombre"])) {
  $nombre = $_POST["nombre"];
}
//Categorias
if (isset($_POST["categoria"])) {
  $categoria = $_POST["categoria"];
}

//subCategorias
if (isset($_POST["subcategoria"])) {
  $subcategoria = implode(',', $_POST["subcategoria"]);
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

 if($sql_receta= $conexion->prepare('INSERT INTO recetas (nombre, idcategoria, idsubcategorias, porciones, tiempo, dificultad, descripcioncorta, descripcion, video, imagen1, imagen2, imagen3, preparacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
  $sql_receta->bind_param('sssssssssssss', $nombre, $categoria, $subcategoria, $porciones, $tiempo, $difilcutad, $Dcorta, $Dlarga, $video, $imagen1, $imagen2, $imagen3, $preparacion);
  $sql_receta->execute();
  $sql_receta->close();
 } else {
  echo 'No es posible preparar el statement';
 }
?>
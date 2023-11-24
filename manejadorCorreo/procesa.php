<?php
//Importem PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'utils/Exception.php';
require 'utils/PHPMailer.php';
require 'utils/SMTP.php';

session_start();
// Recogemos los valores del formulario
if (isset($_POST["nombre"])) {
  $nombre = $_POST["nombre"];
  $_SESSION['nombre'] = $nombre;
}

if (isset($_POST["apellido"])) {
  $apellido = $_POST["apellido"];
  $_SESSION['apellido'] = $apellido;
}

if (isset($_POST["motivo"])) {
  $motivo = $_POST["motivo"];
  $_SESSION['motivo'] = $motivo;
}

if (isset($_POST["temaPregunta"])) {
  $temaPregunta = $_POST["temaPregunta"];
  $_SESSION['temaPregunta'] = $temaPregunta;
}

if (isset($_POST["textPregunta"])) {
  $textPregunta = $_POST["textPregunta"];
}

if (isset($_POST["CheckboxComentario"])) {
  $CheckboxComentario = $_POST["CheckboxComentario"];
}

if (isset($_POST["sugerir"])) {
  $sugerir = $_POST["sugerir"];
}

if (isset($_POST["correo"])) {
  $correo = $_POST["correo"];
}

if (isset($_POST["telefono"])) {
  $telefono = $_POST["telefono"];
}

//Recoger el honey pot
if (isset($_POST["mel"])) {
  $mel = $_POST["mel"];
}

//Confirmo y utilizo honey pot. Importante ocultar con css
if ($mel == "") {
  //Creem el contingut del missatge
  $body = <<<HTML
    <b>Nombre: </b>$nombre
    <br><b>Apellido: </b>$apellido
    <br><b>Motivo para contactarnos: </b>$motivo
    <br><b>Tema sobre el cual desea preguntar: </b>$temaPregunta
    <br><b>Cuerpo especifico de la pregunta: </b>$textPregunta
    <br><b>CheckboxComentario: </b>$CheckboxComentario
    <br><b>sugerir: </b>$sugerir
    <br><b>correo electónico: </b>$correo
    <br><b>Teléfono: </b>$telefono
HTML;
  //Missatge alternatiu per clients de correu que no donin suport a HTML
  $altbody = <<<ALTHTML
  Nombre: $nombre
  Apellido: $apellido
  Motivo: $motivo
  temaPregunta: $temaPregunta
  textPregunta: $textPregunta
  CheckboxComentario: $CheckboxComentario
  sugerir: $sugerir
  correo: $correo
  Teléfono: $telefono
ALTHTML;


  //Instaciem la classe i treballem les excepcions
  $mail = new PHPMailer(true);
  try {
    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );

    $mail->SMTPDebug = 2; // Debug: 0 en producció | 2 en develop
    $mail->isSMTP(); // Enviar utilitzant SMPT
    $mail->Host = 'smtp.gmail.com'; // Indiquem el servei de SMTP que s'utilitzarà
    $mail->SMTPAuth = true; // Activem l'autenticació SMTP
    $mail->Username = 'webformulariscursos@gmail.com'; // SMTP username
    $mail->Password = 'yueo nnge ahsd klhy'; // Contrasenya SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587; // Port TCP port per connectar, port alternatiu (465)

    //Preparem l'enviament
    $mail->setFrom('webformulariscursos@gmail.com'); // Remitent 
    
    $mail->addAddress('ronardj@gmail.com', 'Ronar'); // Destinatari
    
    // Enviament de fitxers adjunts
    if (isset($_FILES['submitDocument']) && $_FILES['submitDocument']['error'] == UPLOAD_ERR_OK) {
      $submitDocument = $_FILES['submitDocument']['name'];
      $temporalDocument = $_FILES['submitDocument']['tmp_name'];
      $mail->addAttachment($temporalDocument, $submitDocument);
     }

     if (isset($_FILES['submitImagen1']) && $_FILES['submitImagen1']['error'] == UPLOAD_ERR_OK) {
      $submitImagen1 = $_FILES['submitImagen1']['name'];
      $temporalImagen1 = $_FILES['submitImagen1']['tmp_name'];
      $mail->addAttachment($temporalImagen1, $submitImagen1);
     }

     if (isset($_FILES['submitImagen2']) && $_FILES['submitImagen2']['error'] == UPLOAD_ERR_OK) {
      $submitImagen2 = $_FILES['submitImagen2']['name'];
      $temporalImagen2 = $_FILES['submitImagen2']['tmp_name'];
      $mail->addAttachment($temporalImagen2, $submitImagen2);
     }
    
    // Content
    $mail->isHTML(true); // Establim format HTML del missatge
    $mail->Subject = $motivo;
    $mail->Body = $body;
    $mail->AltBody = $altbody;
    $mail->CharSet = 'UTF-8';
    $mail->send();
    header("Location:../index.php"); // Arxiu on redirigir l'usuari un cop el correu ha estat enviat 
  } catch (Exception $e) {
    echo "El missatge no s'ha pogut enviar. Error: {$mail->ErrorInfo}";
  }
} else {
  header("Location:../index.php");
}

?>
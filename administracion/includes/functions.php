<?php 
  function secure() {
    if(!isset($_SESSION['password'])){
      echo '<h1> Debes estar logeado para ver esta página</h1>';
      die();
    }
  }

  function set_message($message) {
    { 
      $_SESSION['message'] = $message;
    }
  }

  function get_message() {
    if( isset($_SESSION['message']) ) {
      echo '<p class="get_message">' . $_SESSION['message'] . '</p> <hr>';
      unset($_SESSION['message']);
    }}

?>
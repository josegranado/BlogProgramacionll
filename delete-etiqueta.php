<?php
  
  session_start();
  require_once 'database.php';
  require_once 'models/Tag.php';
  if(isset($_GET['id']))
  {
      $deleted = Tag::delete($_GET['id'], $conn);
      header('Location: /blog/ver-etiquetas.php');
  }
?>
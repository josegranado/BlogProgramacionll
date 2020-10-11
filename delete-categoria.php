<?php
  
  session_start();
  require_once 'database.php';
  require_once 'models/Categorie.php';
  if(isset($_GET['id']))
  {
      $deleted = Categorie::delete($_GET['id'], $conn);
      header('Location: /blog/ver-categorias.php');
  }
?>
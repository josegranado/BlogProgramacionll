<?php
  
  session_start();
  require_once 'database.php';
  require_once 'models/Producto.php';
  if(isset($_GET['id']))
  {
      $deleted = Producto::delete($_GET['id'], $conn);
      header('Location: /blog/ver-productos.php');
  }
?>
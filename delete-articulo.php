<?php
  
  session_start();
  require_once 'database.php';
  require_once 'models/User.php';
  require_once 'models/Article.php';
  if(isset($_GET['id']))
  {
      $deleted = Article::delete($_GET['id'], $conn);
      header('Location: /blog/ver-articulos.php');
  }
?>
<?php
  
  session_start();
  require_once 'database.php';
  require_once 'models/User.php';
  require_once 'models/Producto.php';
  if (isset($_SESSION['user_id'])) {

    $user = User::find($_SESSION['user_id'], $conn);
  }
  
  if (!empty($_POST['title']) && 
  !empty($_POST['description'])&& 
  !empty($_POST['content'])&& 
  !empty($_POST['usuario_id']) &&
  !empty($_POST['price'])) {

      $article = Producto::create([
      		'title' => $_POST['title'],
      		'description' => $_POST['description'],
            'content' => $_POST['content'],
            'price' => $_POST['price'],
      		'usuario_id' => $_POST['usuario_id']
      ], $conn);
      if($article)
      {
      		$message = "PRODUCTO CREADO EXITOSAMENTE";
      }
      else
      {
      		$message = "ERROR, EL PRODUCTO NO FUE CREADO.";
      }
} ?>
<?php require 'partials/header.php'; ?>
<?php if(!empty($article)) { ?>
<div id="app" style="height:200vh;width:100%; background-image: url(assets/img/Fondo.jpg);">
    <nav class="navbar navbar-expand-lg" >
      <div class="container">
        <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
    <section id="main">
        <div class="container">
          <div class="row">
              <div class="col-12">
              	<div class="alert alert-success" style="width:100%">
              	<p><?php echo $message; ?></p>
              </div>
              </div>
              <div class="col-6">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title">Articulos</h5>
                    <a href="crear-articulo.php" class="btn btn-outline-success">Crear</a>
                    <a href="ver-articulos.php" class="btn btn-outline-primary">Ver</a>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card text-center" style="margin: 5px auto;">
                  <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <a href="crear-producto.php" class="btn btn-outline-success">Crear</a>
                    <a href="ver-productos.php" class="btn btn-outline-primary">Ver</a>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card text-center" style="margin: 5px auto;">
                  <div class="card-body">
                    <h5 class="card-title">Categorias</h5>
                    <a href="crear-categoria.php" class="btn btn-outline-success">Crear</a>
                    <a href="ver-categorias.php" class="btn btn-outline-primary">Ver</a>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card text-center" style="margin: 5px auto;">
                  <div class="card-body">
                    <h5 class="card-title">Etiquetas</h5>
                    <a href="crear-etiqueta.php" class="btn btn-outline-success">Crear</a>
                    <a href="ver-etiquetas.php" class="btn btn-outline-primary">Ver</a>
                  </div>
                </div>
              </div>
          
        </div>
    </section>
  </div>
 <?php } ?>
<?php require 'partials/footer.php'; ?>
<?php require 'partials/scripts.php'; ?>
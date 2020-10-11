<?php
  
  session_start();
  require_once 'database.php';
  require_once 'models/Categorie.php';
  $categories = Categorie::all($conn);
 
?>

<?php require 'partials/header.php'; ?>
<div id="app" style="height:300vh;width:100%; background-image: url(assets/img/Fondo.jpg);">
    <nav class="navbar navbar-expand-lg" >
      <div class="container">
        <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
        	<li class="nav-item">
            <a class="nav-link btn btn-outline-light" href="index.php">Regresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
    <section id="main">
        <div class="container">
        	<h1 class="text-white text-center">Todas las categorias</h1>
          <div class="row text-center">
              <?php if(!$categories)
              {
                ?> <p class="text-white text-center" style="text-align:center"> 
                No hay articulos para mostrar.  
              </p>
              <?php }else{ ?>
          	 <?php foreach($categories as $categorie){?>

              <div class="col-4" style="margin:10px auto;">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title"><b>Nombre: &nbsp</b><?php echo $categorie['nombre']; ?></h5>
                    <p class="card-text"><b>Descripcion: &nbsp</b><?php echo $categorie['description']; ?></p>
                    <p><a href="edit-categoria.php?id=<?php echo $categorie['id']?>" class="btn btn-outline-success">Editar</a>
                    <a href="delete-categoria.php?id=<?php echo $categorie['id']?>" class="btn btn-outline-danger">Delete</a></p>
                  </div>
                </div>
              </div>
          <?php } ?>
          </div>
        </div>
    </section>
  </div>
<?php } ?>
<?php require 'partials/footer.php'; ?>
<?php require 'partials/scripts.php'; ?>
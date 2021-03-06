<?php
  
  session_start();
  require_once 'database.php';
  require_once 'models/User.php';
  require_once 'controllers/UserController.php';
  if (isset($_SESSION['user_id'])) {

    $user = User::find($_SESSION['user_id'], $conn);
  }
?>

<?php require 'partials/header.php' ?>
<?php if(!empty($user)): ?>
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
          <div class="row">
              <div class="col-12">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title">Crear producto</h5>
                    <form action="store-producto.php" method="POST">
                      <div class="form-group">
                        <label for="title">Titulo</label>
                        <input class="form-control" name="title" id="title" type="text" placeholder="Ingresa el titulo">
                      </div>
                      <div class="form-group">
                          <label for="description">Descripcion</label>
                          <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="content">Contenido</label>
                          <textarea name="content" class="form-control" id="content" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="price">Price</label>
                          <input class="form-control" step="0.01" name="price" id="price" type="number" placeholder="Ingresa el precio">
                      </div>
                      <div class="form-group">
                          <input class="form-control" name="usuario_id" id="usuario_id" type="hidden" placeholder="Ingresa el titulo" value="<?php echo $user['id']; ?>">
                      </div>
                      <button style="margin:auto" type="submit" class="btn btn-outline-success btn-block">Crear Articulo</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </section>
  </div>
<?php else: 
   header('Location: /blog');
endif; ?>
<?php require 'partials/footer.php' ?>
<?php require 'partials/scripts.php' ?>
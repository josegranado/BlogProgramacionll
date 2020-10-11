<?php
  
  session_start();
  require_once 'database.php';
  require_once 'models/User.php';
  require_once 'models/Producto.php';
  if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['content']) && isset($_POST['price']))
  {
    $created = Producto::update([
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'content' => $_POST['content'],
        'price' => $_POST['price']
    ], 
    $_GET['id'],
    $conn);  
    header('Location: /blog/ver-productos.php');
  }
  if (isset($_SESSION['user_id'])) {

    $user = User::find($_SESSION['user_id'], $conn);
    $producto = Producto::find($_GET['id'], $conn);
  }
  if($producto)
  {
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
          <div class="row">
              <div class="col-6" style="margin:10px auto;">
                <div class="card text-center">
                  <div class="card-body">
                  <h5 class="card-title">Editar producto</h5>
                    <form action="edit-producto.php?id=<?php echo $producto['id']; ?>" method="POST">
                      <div class="form-group">
                        <label for="title">Titulo</label>
                        <input class="form-control" name="title" id="title" type="text" placeholder="Ingresa el titulo"
                        value="<?php echo $producto['title']; ?>"
                        >
                      </div>
                      <div class="form-group">
                          <label for="description">Descripcion</label>
                          <textarea name="description" class="form-control" id="description" rows="3"
                          value="<?php echo $producto['description']; ?>"
                          ><?php echo $producto['description']; ?></textarea>
                      </div>
                      <div class="form-group">
                          <label for="content">Contenido</label>
                          <textarea name="content" class="form-control" id="content" rows="3"
                          value="<?php echo $producto['content']; ?>"
                          ><?php echo $producto['content']; ?></textarea>
                      </div>
                      <div class="form-group">
                          <label for="price">Price</label>
                          <input class="form-control" step="0.01" name="price" id="price" type="number" 
                          placeholder="Ingresa el precio"
                          value="<?php echo $producto['price']; ?>"
                          >
                      </div>
                      <button style="margin:auto" type="submit" class="btn btn-outline-success btn-block">Editar Articulo</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </section>
  </div>
<?php } ?>
<?php  ?>
<?php require 'partials/footer.php'; ?>
<?php require 'partials/scripts.php'; ?>
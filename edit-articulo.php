<?php
  
  session_start();
  require_once 'database.php';
  require_once 'models/User.php';
  require_once 'models/Article.php';
  if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['content']))
  {
    $created = Article::update([
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'content' => $_POST['content']
    ], 
    $_GET['id'],
    $conn);  
    header('Location: /blog/ver-articulos.php');
  }
  if (isset($_SESSION['user_id'])) {

    $user = User::find($_SESSION['user_id'], $conn);
    $article = Article::find($_GET['id'], $conn);
  }
  if($article)
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
        	<h1 class="text-white text-center">Todos los articulos</h1>
          <div class="row">
              <div class="col-6" style="margin:10px auto;">
                <div class="card text-center">
                  <div class="card-body">
                  <h5 class="card-title">Editar articulo</h5>
                    <form action="edit-articulo.php?id=<?php echo $article['id']; ?>" method="POST">
                      <div class="form-group">
                        <label for="title">Titulo</label>
                        <input class="form-control" name="title" id="title" type="text" placeholder="Ingresa el titulo"
                        value="<?php echo $article['title']; ?>"
                        >
                      </div>
                      <div class="form-group">
                          <label for="description">Descripcion</label>
                          <textarea name="description" class="form-control" id="description" rows="3"
                          value="<?php echo $article['description']; ?>"
                          ><?php echo $article['description']; ?></textarea>
                      </div>
                      <div class="form-group">
                          <label for="content">Contenido</label>
                          <textarea name="content" class="form-control" id="content" rows="3"
                          value="<?php echo $article['content']; ?>"
                          ><?php echo $article['content']; ?></textarea>
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
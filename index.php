<?php
  
  session_start();
  require_once 'database.php';
  require_once 'models/User.php';
  require_once 'controllers/UserController.php';
  if (!empty($_POST['login']) && !empty($_POST['clave'])) {

      $userController = UserController::login([ 
          'login' => $_POST['login'],
          'clave' => $_POST['clave'],
        ], $conn);
      if ($userController)
      {
          $_SESSION['user_id'] = $userController;
          $user = User::find($_SESSION['user_id'], $conn);
      }
  }
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
                    <h5 class="card-title">Articulos</h5>
                    <a href="crear-articulo.php" class="btn btn-outline-success">Crear</a>
                    <a href="ver-articulos.php" class="btn btn-outline-primary">Ver</a>
                  </div>
                </div>
              </div>
              
          </div>
        </div>
    </section>
  </div>
<?php else: ?>
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
            <a class="nav-link btn btn-outline-light" href="index.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light" href="signup.php">Registrarme</a>
          </li>
        </ul>
      </div>
      </div>
    </nav>
    <form action="index.php" method="POST" style="width:100%;height:85vh;text-align:center" class="d-flex align-items-center justify-content-center; top:-30px;">
      <table style=" background:rgba(0,0,0, 0.5);padding:20px !important;width:30% !important;margin:auto;border-radius:10px" class="text-center">
         <thead>
            <tr>
              <th scope="col" class=><div class="form-group">
          <h4 class="text-white mt-4">Login</h4>
        </div></th>
            </tr>
          </thead>
        <tbody class="text-center">
            <tr>
              <th scope="row"><div class="form-group text-white"><label for="login">Nombre de usuario</label></div></th>
              
            </tr>
            <tr>
              <th scope="row"><div class="form-group "><input name="login" type="text" class="form-control"  style="width:90% !important;margin:auto" id="login" aria-describedby="emailHelp" placeholder="Enter email">
</div></th>
              
            </tr>
            <tr>
              <th scope="row"><div class="form-group text-white">
                 <label for="clave">Contraseña</label>
              </div></th>
           
            </tr>
            <tr>
              <th scope="row"><input type="password" name="clave" class="form-control" id="clave" style="width:90% !important;margin:auto" placeholder="Password"></th>
            </tr>
             <tr>
              <th scope="row"><div class="form-group mt-4">
                <button style="width:90% !important;margin:auto" type="submit" class="btn btn-outline-light btn-block">Submit</button>
              </div></th>
            </tr>
            <tr>
              <th scope="row"><div class="form-group mt-4">
                <div class="alert-warning">
                  <?php if(!empty($message)): ?>
                  <p> <? echo $message; ?></p>
                  <?php endif; ?>
                </div> </button>
              </div></th>
              
            </tr>
          </tbody>
        
      </table>
    </form>
  </div>
<?php endif; ?>
<?php require 'partials/footer.php' ?>
<?php require 'partials/scripts.php' ?>

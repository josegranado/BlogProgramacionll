<?php
  require_once 'database.php';
  require_once 'models/User.php';
  if (!empty($_POST['nombre']) && !empty($_POST['apellido']) &&!empty($_POST['login']) && !empty($_POST['clave'])) {
    $user = new User();
    $user = User::create([
      'nombre' => $_POST['nombre'],
      'apellido' => $_POST['apellido'],
      'login' => $_POST['login'],
      'clave' => $_POST['clave'],
      'type' => 'admin'
    ], $conn);
    header('Location: /blog');
  }
  require 'partials/header.php';
?>
  <div id="app" style="height:130vh;margin:0;width:100%; background-image: url(assets/img/Fondo.jpg);">
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
    <form style="width:100%;height:85vh;text-align:center" class="d-flex align-items-center justify-content-center; top:-30px;" action="signup.php" method="POST">
      <table style=" background:rgba(0,0,0, 0.5);padding:20px !important;width:30% !important;margin:auto;border-radius:10px" class="text-center">
         <thead>
            <tr>
              <th scope="col" class=><div class="form-group">
          <h4 class="text-white mt-4">Registro</h4>
        </div></th>
            </tr>
          </thead>
        <tbody class="text-center">
          <tr>
              <th scope="row"><div class="form-group text-white"><label for="nombre">Nombre</label></div></th>
              
            </tr>
            <tr>
              <th scope="row"><div class="form-group "><input type="text" class="form-control"  style="width:90% !important;margin:auto" id="nombre" name="nombre" placeholder="Ingresa tu nombre">
            </div></th>
              
            </tr>
            <th scope="row"><div class="form-group text-white"><label for="apellido">Apellido</label></div></th>
              
            </tr>
            <tr>
              <th scope="row"><div class="form-group "><input type="text" class="form-control"  style="width:90% !important;margin:auto" id="apellido" name="apellido" placeholder="Ingresa tu apellido">
            </div></th>
              
            </tr>
            <tr>
              <th scope="row"><div class="form-group text-white"><label for="login">Nombre de usuario</label></div></th>
              
            </tr>
            <tr>
              <th scope="row"><div class="form-group "><input type="text" class="form-control"  style="width:90% !important;margin:auto" id="login" name="login" aria-describedby="emailHelp" placeholder="Ingresa tu usuario">
</div></th>
              
            </tr>
            <tr>
              <th scope="row"><div class="form-group text-white">
                 <label for="clave">Contraseña</label>
              </div></th>
           
            </tr>
            <tr>
              <th scope="row"><input type="password" class="form-control" id="clave" name="clave" style="width:90% !important;margin:auto" placeholder="Password"></th>
            </tr>       
            </tr>
             <tr>
              <th scope="row"><div class="form-group mt-4">
                <button style="width:90% !important;margin:auto" type="submit" class="btn btn-outline-light btn-block">Registrarme</button>
              </div></th>
            </tr>
           
          </tbody>
        
      </table>
    </form>
  </div>
<?php require 'partials/footer.php' ?>
<?php require 'partials/scripts.php' ?>
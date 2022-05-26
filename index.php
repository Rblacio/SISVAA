<?php
  session_start();
  $alert = '';
  if(!empty($_SESSION['active'])){
    header('location: assets/');

  }else{
    if(!empty($_POST)){
      if(empty($_POST['usuario']) || empty($_POST['contraseña'])){
        $alert = 'Ingrese el usuario y clave';
      }else{

        require_once ('conexion.php');

        $usuario = mysqli_real_escape_string($conn,$_POST['usuario']);
        $contraseña = mysqli_real_escape_string($conn,$_POST['contraseña']);

        $query = mysqli_query($conn,"SELECT u.cedula,u.nombres,u.telefono,u.direccion,u.usuario, u.contraseña, u.fechanacimiento,u.estado, t.tipousuario FROM usuarios u INNER JOIN tipousuario t ON(t.idtipousuario = u.idtipousuario) WHERE (usuario ='$usuario' && contraseña = '$contraseña')");
        $result = mysqli_num_rows($query);

        if($result>0){
          $data = mysqli_fetch_array($query);
          $_SESSION['active'] = true;
          $_SESSION['cedula'] = $data['cedula'];
          $_SESSION['nombres'] = $data['nombres'];
          $_SESSION['usuario'] = $data['usuario'];
          $_SESSION['tipousuario'] = $data['tipousuario'];

          header('location: assets/');

        }else{
          $alert = 'Usuario o clave incorrectos';
          session_destroy();  
        }
      }
    }
  }

  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SISVAA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css" media="screen"/>
</head>
<body>

    <main class="m-0 vh-100 row justify-content-center align-items-center">
        <div class="container-fluid col-sm-6 col-md-4 col-lg-4">
            <div class="row">
                <div class="card rounded-4">
                    <div class="text-center bg-white card-header border-bottom-0">
                        <img src="img/sisvaa.png" width="300" class=" mt-2 img-fluid" alt="LOGO SISVAA">
                        <h1 class="m-3">LOGIN</h1>
                    </div>
                    <div id='alert'>
                      <?php echo isset($alert)? $alert: ''; ?>
                    </div>
                    <div class="card-body">
                      <form id="loginForm" action="" method="post" class="mb-4">
                        <div class="mb-1">
                            <label for="usuario" class="col-md-12 col-form-label fw-bold">Usuario</label>
                            <div class="col-md-12">
                              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                            </div>
                          </div>
                          <div class="mb-1 mt-3">
                            <label for="contraseña" class="col-md-12 col-form-label fw-bold">Password</label>
                            <div class="col-md-12">
                              <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Password">
                            </div>
                          </div>
                          <div class="mt-4">
                            <div class="col-md-12">
                              <input type="submit" class="ingresar form-control fw-bold" value="Ingresar">
                            </div>
                          </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-center text-lg-end fixed-bottom">
        <div class="text-center p-3 fw-bold">
          © 2022 Copyright:
          <a class="empresa text-dark" href="#">SISVAA</a>
        </div>
    </footer>

    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
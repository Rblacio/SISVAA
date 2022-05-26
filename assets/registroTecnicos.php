<?php
session_start();
  require_once ('../conexion.php');
  if(empty($_SESSION['active']) || $_SESSION['tipousuario'] != 'Administrador' ){
    header('location: /SISVAA');
  }

  if(!empty($_POST))
  {
    if(empty($_POST['cedula']) || empty($_POST['nombres']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['usuario']) || empty($_POST['contraseña']) || empty($_POST['fechanacimiento']) || empty($_POST['idtipousuario']))
    {

    }else{
      $cedula = $_POST['cedula'];
      $nombres = $_POST['nombres'];
      $telefono = $_POST['telefono'];
      $direccion = $_POST['direccion'];
      $usuario = $_POST['usuario'];
      $contraseña = $_POST['contraseña'];
      $fechanacimiento = $_POST['fechanacimiento'];
      $idtipousuario = $_POST['idtipousuario'];

      $query = mysqli_query($conn, "SELECT * FROM usuarios where cedula = '$cedula'");
      $result = mysqli_fetch_array($query);
      if ($result > 0){

      }else{
        $query_insert = mysqli_query($conn, "INSERT INTO USUARIOS(cedula, nombres, telefono, direccion, usuario, contraseña, fechanacimiento, idtipousuario) VALUES ('$cedula','$nombres','$telefono', '$direccion', '$usuario', '$contraseña', '$fechanacimiento', '$idtipousuario')");

        if($query_insert){
          header('location: listaTecnicos.php');
        }else{

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
    <title>SISVAA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/index.css" media="screen"/>
</head>
<body>

  <?php
    include './asset/nav.php';
  ?>

  <div class="container">
    <div class="row">
      <div class="col-6 mt-3"><h1 class="text-decoration-underline fw-bold">Registrar Técnico</h1></div>
      <div class="col-6 mt-4 text-end"><a href="./listaTecnicos.php">Listado</a></div>
    </div>
    <div class="mt-5 row justify-content-center align-items-center">
      <div class="col-sm-12 col-md-9 col-lg-8">
        <form id="loginForm" action="" method="post" class="mb-4">
          <div class="row">
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-fingerprint trailing"></i>
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cédula">
                <label for="cedula" class="form-label text-black fw-bold">Cédula</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-signature trailing"></i>         
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres">
                <label for="nombres" id="nombres" class="form-label text-black fw-bold">Nombres</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-phone trailing"></i>             
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                <label for="telefono" id="telefono" class="form-label text-black fw-bold">Teléfono</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-route trailing"></i>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                <label for="direccion" class="form-label text-black fw-bold">Dirección</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-user trailing"></i>       
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                <label for="usuario" class="form-label text-black fw-bold">Usuario</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-key trailing"></i>
                <input type="password" class="form-control" id="contraseña" name="contraseña">
                <label for="contraseña" id="contraseña" class="form-label text-black fw-bold">Contraseña</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento">
                <label for="fechanacimiento" class="form-label text-black fw-bold">Fecha Nacimiento</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <?php
                $query_rol = mysqli_query($conn, "SELECT idtipousuario, tipousuario FROM tipousuario");
                $result_rol =  mysqli_num_rows($query_rol);
              ?>
              <select class="form-select fw-bold" name="idtipousuario" id="idtipousuario">
                <option selected disabled="disabled">Selecionar</option>
                <?php
                if ($result_rol > 0){
                  while($tipousuario = mysqli_fetch_array($query_rol)){
              ?>
                <option value="<?php echo $tipousuario["idtipousuario"]?>">
                  <?php 
                    echo $tipousuario["tipousuario"];
                  ?>
                </option>
                <?php
                    }
                  }
                ?>
              </select>
            </div>
            
            <div class="conatiner mt-4">
              <div class="row justify-content-md-center">
 
                <div class="col-md-auto">
                  <input type="submit" class="ingresar form-control fw-bold bg-success text-white" value="Ingresar">
                </div>

              </div>
            </div>
          </div>  
      </form>
      </div>
    </div>
  </div>
  
  
  <script src="./js/app.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
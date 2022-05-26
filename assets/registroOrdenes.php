<?php
session_start();
  require_once ('../conexion.php');
  if(empty($_SESSION['active']) || $_SESSION['tipousuario'] != 'Administrador' ){
    header('location: /SISVAA');
  }

  if(!empty($_POST))
  {
    if(empty($_POST['cedulatecnico']) || empty($_POST['titulOrden']) || empty($_POST['descripcion']) || empty($_POST['fechaasignacion']) || empty($_POST['fechafinalizacion']) || empty($_POST['costotrabajo']) || empty($_POST['cedulacliente']) || empty($_POST['cedulaadministrador']) || empty($_POST['idtipoorden']))
    {

    }else{
      $cedulatecnico = $_POST['cedulatecnico'];
      $titulOrden = $_POST['titulOrden'];
      $descripcion = $_POST['descripcion'];
      $fechaasignacion = $_POST['fechaasignacion'];
      $fechafinalizacion = $_POST['fechafinalizacion'];
      $costotrabajo = $_POST['costotrabajo'];
      $cedulacliente = $_POST['cedulacliente'];
      $cedulaadministrador = $_POST['cedulaadministrador'];
      $idtipoorden = $_POST['idtipoorden'];

      $query_insert = mysqli_query($conn, "INSERT INTO ordentrabajo (cedulatecnico, titulOrden, descripcion, fechaasignacion, fechafinalizacion, costotrabajo, cedulacliente, cedulaadministrador, idtipoorden) VALUES ('$cedulatecnico','$titulOrden','$descripcion', '$fechaasignacion', '$fechafinalizacion', '$costotrabajo', '$cedulacliente', '$cedulaadministrador', '$idtipoorden')");

      if($query_insert){
        header('location: listaOrdenes.php');
      }else{

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
      <div class="col-6 mt-3"><h1 class="text-decoration-underline fw-bold">Registrar Ordenes de trabajo</h1></div>
      <div class="col-6 mt-4 text-end"><a href="./listaOrdenes.php">Listado</a></div>
    </div>
    <div class="mt-5 row justify-content-center align-items-center">
      <div class="col-sm-12 col-md-9 col-lg-8">
        <form id="loginForm" action="" method="post" class="mb-4">
          <div class="row">
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-fingerprint trailing"></i>
                <input type="text" class="form-control" id="cedulatecnico" name="cedulatecnico" placeholder="Cédula técnico">
                <label for="cedulatecnico" class="form-label text-black fw-bold">Cédula técnico</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-signature trailing"></i>         
                <input type="text" class="form-control" id="titulOrden" name="titulOrden" placeholder="Título orden">
                <label for="titulOrden" id="titulOrden" class="form-label text-black fw-bold">Título orden</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-audio-description trailing"></i>   
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" rows="4"></textarea>        
                <label for="descripcion" id="descripcion" class="form-label text-black fw-bold">Descripción</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <input type="date" class="form-control" id="fechaasignacion" name="fechaasignacion">
                <label for="fechaasignacion" class="form-label text-black fw-bold">Fecha asignación</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <input type="date" class="form-control" id="fechafinalizacion" name="fechafinalizacion">
                <label for="fechafinalizacion" class="form-label text-black fw-bold">Fecha finalización</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-route trailing"></i>
                <input type="text" class="form-control" id="costotrabajo" name="costotrabajo" placeholder="$ Costo">
                <label for="costotrabajo" class="form-label text-black fw-bold">$ Costo</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-user trailing"></i>       
                <input type="text" class="form-control" id="cedulacliente" name="cedulacliente" placeholder="Cédula cliente">
                <label for="cedulacliente" class="form-label text-black fw-bold">Cécula cliente</label>
              </div>
            </div>
            <div class="mt-3 col-md-6" hidden="true">
              <div class="form-outline">
                <i class="fa-solid fa-user trailing"></i>       
                <input type="text" readonly class="form-control" id="cedulaadministrador" name="cedulaadministrador" value="<?php echo $_SESSION['cedula'];?>">
                <label for="cedulaadministrador" class="form-label text-black fw-bold">Cécula administrador</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <?php
                $query_rol = mysqli_query($conn, "SELECT idtipoorden, orden FROM tipoorden ORDER BY idtipoorden asc");
                $result_rol =  mysqli_num_rows($query_rol);
              ?>
              <select class="form-select fw-bold" name="idtipoorden" id="idtipoorden">
                <option selected disabled="disabled">Selecionar</option>
                <?php
                if ($result_rol > 0){
                  while($tipousuario = mysqli_fetch_array($query_rol)){
              ?>
                <option value="<?php echo $tipousuario["idtipoorden"]?>">
                  <?php 
                    echo $tipousuario["orden"];
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
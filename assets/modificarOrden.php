<?php
session_start();
  require_once ('../conexion.php');
  $id = $_GET['id'];

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
      
      $sql_updater = mysqli_query($conn, "UPDATE ordentrabajo SET cedulatecnico = '$cedulatecnico', titulOrden = '$titulOrden', descripcion = '$descripcion', fechaasignacion = '$fechaasignacion', fechafinalizacion = '$fechafinalizacion', costotrabajo = '$costotrabajo', cedulacliente = '$cedulacliente', cedulaadministrador = '$cedulaadministrador', idtipoorden = '$idtipoorden' WHERE idOrden = $id");
      if($sql_updater){
        header('location: listaOrdenes.php');
      }else{

      }
    }
  }

  if(empty($_GET['id'])){
    header('location: listaOrdenes.php');
  }


  $sql = mysqli_query($conn, "SELECT o.idorden, o.cedulatecnico, u.nombres, o.cedulacliente, c.nombreCliente, o.titulOrden, o.descripcion, o.cedulaadministrador, o.idtipoorden, o.costotrabajo, o.fechaasignacion, o.fechafinalizacion, t.Orden FROM ordentrabajo o INNER JOIN usuarios u ON (u.cedula = o.cedulatecnico) INNER JOIN clientes c ON (c.cedulaCliente = o.cedulacliente) INNER JOIN tipoorden t ON (t.idtipoOrden = o.idtipoorden) WHERE o.idorden = $id");

  $result_sql = mysqli_num_rows($sql);

  if($result_sql == 0){
      header('location: listaOrdenes.php');
  }
  else{
    $option = '';
    while( $data = mysqli_fetch_array($sql)){
      $cedulatecnico = $data['cedulatecnico'];
      $titulOrden = $data['titulOrden'];
      $descripcion = $data['descripcion'];
      $fechaasignacion = $data['fechaasignacion'];
      $fechafinalizacion = $data['fechafinalizacion'];
      $costotrabajo = $data['costotrabajo'];
      $cedulacliente = $data['cedulacliente'];
      $cedulaadministrador = $data['cedulaadministrador'];
      $idtipoorden = $data['idtipoorden'];
      $tipoorden = $data['Orden'];

      if($idtipoorden == 1){
        $option = '<option value="'.$idtipoorden.'" select>'.$tipoorden.'</option>';
      }
      if($idtipoorden == 2){
        $option = '<option value="'.$idtipoorden.'" select>'.$tipoorden.'</option>';
      }
      if($idtipoorden == 3){
        $option = '<option value="'.$idtipoorden.'" select>'.$tipoorden.'</option>';
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
      <div class="col-6 mt-3"><h1 class="text-decoration-underline fw-bold">Actualizar Ordenes de trabajo</h1></div>
      <div class="col-6 mt-4 text-end"><a href="./listaOrdenes.php">Listado</a></div>
    </div>
    <div class="mt-5 row justify-content-center align-items-center">
      <div class="col-sm-12 col-md-9 col-lg-8">
        <form id="loginForm" action="" method="post" class="mb-4">
          <div class="row">
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-fingerprint trailing"></i>
                <input type="text" readonly="readonly" class="form-control" id="idorden" name="idorden" value="<?php echo $id; ?>">
                <label for="idorden" class="form-label text-black fw-bold">Id Orden</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-fingerprint trailing"></i>
                <input type="text" class="form-control" id="cedulatecnico" name="cedulatecnico" value="<?php echo $cedulatecnico; ?>">
                <label for="cedulatecnico" class="form-label text-black fw-bold">Cédula técnico</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-signature trailing"></i>         
                <input type="text" class="form-control" id="titulOrden" name="titulOrden" value="<?php echo $titulOrden; ?>">
                <label for="titulOrden" id="titulOrden" class="form-label text-black fw-bold">Título orden</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-audio-description trailing"></i>   
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4"><?php echo $descripcion;?></textarea>        
                <label for="descripcion" id="descripcion" class="form-label text-black fw-bold">Descripción</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <input type="date" class="form-control" id="fechaasignacion" name="fechaasignacion" value="<?php echo $fechaasignacion; ?>">
                <label for="fechaasignacion" class="form-label text-black fw-bold">Fecha asignación</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <input type="date" class="form-control" id="fechafinalizacion" name="fechafinalizacion" value="<?php echo $fechafinalizacion; ?>">
                <label for="fechafinalizacion" class="form-label text-black fw-bold">Fecha finalización</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-route trailing"></i>
                <input type="text" class="form-control" id="costotrabajo" name="costotrabajo" value="<?php echo $costotrabajo; ?>">
                <label for="costotrabajo" class="form-label text-black fw-bold">$ Costo</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-user trailing"></i>       
                <input type="text" class="form-control" id="cedulacliente" name="cedulacliente" value="<?php echo $cedulacliente; ?>">
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
                $query_rol = mysqli_query($conn, "SELECT idtipoorden, Orden FROM tipoorden");
                $result_rol =  mysqli_num_rows($query_rol);
              ?>
              <select class="form-select fw-bold" name="idtipoorden" id="idtipoorden">
                <?php
                echo $option;
                if ($result_rol > 0){
                  while($tipoorden = mysqli_fetch_array($query_rol)){
              ?>
                <option value="<?php echo $tipoorden["idtipoorden"]?>">
                  <?php 
                    echo $tipoorden["Orden"];
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
                  <input type="submit" class="ingresar form-control fw-bold bg-success text-white" value="Actualizar">
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
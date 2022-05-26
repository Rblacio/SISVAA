<?php
session_start();
    require_once ('../conexion.php');
    if(empty($_SESSION['active']) || $_SESSION['tipousuario'] != 'Administrador' ){
      header('location: /SISVAA');
    }
    if(!empty($_POST)){
      if(empty($_POST['cedulaCliente']) || empty($_POST['nombreCliente']))// || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['email']))
        {

        }else{
          $cedulaCliente = $_POST['cedulaCliente'];
          $nombreCliente = $_POST['nombreCliente'];
          $telefono = $_POST['telefono'];
          $direccion = $_POST['direccion'];
          $email = $_POST['email'];

          $query = mysqli_query($conn, "SELECT * FROM clientes where cedulaCliente = '$cedulaCliente'");
          $result = mysqli_fetch_array($query);
          if ($result > 0){
            header('location: listaclientes.php');
          }else{
            $sql_updater = mysqli_query($conn, "UPDATE clientes SET nombreCliente = '$nombreCliente' WHERE cedulaCliente = '$cedulaCliente'");
            if($sql_updater){
            }else{

            }
          }
        }
    }

    if(empty($_GET['id'])){
        header('location: listaclientes.php');
    }

    $id = $_GET['id'];

    $sql = mysqli_query($conn, "SELECT cedulaCliente, nombreCliente, telefono, direccion, email FROM clientes WHERE cedulaCliente = $id");

    $result_sql = mysqli_num_rows($sql);

    if($result_sql == 0){
      header('location: listaclientes.php');
    }else{
      $option = '';
      while( $data = mysqli_fetch_array($sql)){
        $nombreCliente = $data['nombreCliente'];
        $telefono = $data['telefono'];
        $direccion = $data['direccion'];
        $email = $data['email'];

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
      <div class="col-6 mt-3"><h1 class="text-decoration-underline fw-bold">Actualizar Cliente</h1></div>
      <div class="col-6 mt-4 text-end"><a href="./listaclientes.php">Listado</a></div>
    </div>
    <div class="mt-5 row justify-content-center align-items-center">
      <div class="col-sm-12 col-md-9 col-lg-8">
        <form id="loginForm" action="" method="post" class="mb-4">
          <div class="row">
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-fingerprint trailing"></i>
                <input type="text" readonly="readonly" class="form-control" id="cedulaCliente" name="cedulaCliente" value="<?php echo $id; ?>">
                <label for="cedulaCliente" class="form-label text-black fw-bold">Cédula</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-signature trailing"></i>         
                <input type="text" class="form-control" id="nombreCliente" name="nombreCliente" value="<?php echo $nombreCliente; ?>">
                <label for="nombreCliente" id="nombreCliente" class="form-label text-black fw-bold">Nombres</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-phone trailing"></i>             
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
                <label for="telefono" id="telefono" class="form-label text-black fw-bold">Teléfono</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-route trailing"></i>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>">
                <label for="direccion" class="form-label text-black fw-bold">Dirección</label>
              </div>
            </div>
            <div class="mt-3 col-md-6">
              <div class="form-outline">
                <i class="fa-solid fa-user trailing"></i>       
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                <label for="email" class="form-label text-black fw-bold">Email</label>
              </div>
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
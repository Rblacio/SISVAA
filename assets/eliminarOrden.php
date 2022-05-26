<?php
session_start();
    include ('../conexion.php');

    if(empty($_SESSION['active']) || $_SESSION['tipousuario'] != 'Administrador' ){
        header('location: /SISVAA');
    }

    if(!empty($_POST)){
        $id = $_POST['idorden'];
        $sql_updater = mysqli_query($conn, "UPDATE ordentrabajo SET estado = 0 WHERE idorden = $id");
        if($sql_updater){
            header('location: listaOrdenes.php');
        }else{
        }
    }

    if(empty($_REQUEST['id'])){
        header('location: listaOrdenes.php');
    }else{
        $id = $_REQUEST['id'];
        $sql = mysqli_query($conn, "SELECT o.titulOrden, o.descripcion, o.costotrabajo, o.fechaasignacion, o.fechafinalizacion FROM ordentrabajo o WHERE o.idorden = $id");

        $result_sql = mysqli_num_rows($sql);
        if( $result_sql > 0){

            while( $data = mysqli_fetch_array($sql)){
                $titulOrden = $data['titulOrden'];
                $descripcion = $data['descripcion'];
                $fechaasignacion = $data['fechaasignacion'];
                $fechafinalizacion = $data['fechafinalizacion'];
                $costotrabajo = $data['costotrabajo'];
            }
        }else{
            header('location: listaOrdenes.php');
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
            <div class="col-12 mt-3 text-center">
                <h1 class="text-decoration-underline fw-bold">Eliminar Registrar Ordenes</h1>
            </div>
        </div>
        <div class="mt-5 row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-8">

                <div class="mt-3 col-md-4">
                    <div class="form-outline">
                        <i class="fa-solid fa-signature"></i>         
                        <label for="nombres" id="nombres" class="form-label text-black fw-bold">Título orden:</label>
                        <p><span><?php echo $titulOrden; ?></span></p>
                    </div>
                </div>

                <div class="mt-3 col-md-4">
                    <div class="form-outline">
                        <i class="fa-solid fa-phone"></i>             
                        <label for="telefono" id="telefono" class="form-label text-black fw-bold">Descipción:</label>
                        <p><span><?php echo $descripcion; ?></span></p>
                    </div>
                </div>

                <div class="mt-3 col-md-4">
                    <div class="form-outline">
                        <i class="fa-solid fa-calendar"></i>
                        <label for="direccion" class="form-label text-black fw-bold">Fecha de asignación:</label>
                        <p><span><?php echo $fechaasignacion; ?></span></p>
                    </div>
                </div>

                <div class="mt-3 col-md-4">
                    <div class="form-outline">
                        <i class="fa-solid fa-calendar"></i>      
                        <label for="usuario" class="form-label text-black fw-bold">Fecha de finalización:</label>
                        <p><span><?php echo $fechafinalizacion; ?></span></p>
                    </div>
                </div>

                <div class="mt-3 col-md-4">
                    <div class="form-outline">
                        <i class="fa-solid fa-money-bill"></i>
                        <label for="fechanacimiento" class="form-label text-black fw-bold">Valor monetario:</label>
                        <p>$ <span><?php echo $costotrabajo; ?></span></p>
                    </div>
                </div>

                <form id="loginForm" action="" method="post" class="mb-4">
                    <div class="row">

                        <div class="mt-3 col-md-6" hidden>
                            <div class="form-outline">
                                <input type="text" name="idorden" readonly class="form-control fw-bold" value="<?php echo $id;?>">
                            </div>
                        </div>

                        <div class="conatiner mt-4">
                            <div class="row justify-content-md-center">
                                <div class="col-3">
                                    <input type="submit" class="form-control fw-bold bg-danger text-white" value="Eliminar">
                                </div>
                                <div class="col-6 text-end">
                                    <a class="col-3" href="./listaTecnicos.php">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
  
  

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_start();
    include ('../conexion.php');
    if(empty($_SESSION['active']) || $_SESSION['tipousuario'] != 'Administrador' ){
        header('location: /SISVAA');
    }

    if(!empty($_POST)){
        $cedula = $_POST['cedula'];
        $sql_updater = mysqli_query($conn, "UPDATE USUARIOS SET estado = 0 WHERE cedula = '$cedula'");
        if($sql_updater){
            header('location: listaTecnicos.php');
        }else{
        }
    }


    if(empty($_REQUEST['id'])){
      header('location: listaTecnicos.php');
    }else{
        $id = $_REQUEST['id'];
        $sql = mysqli_query($conn, "SELECT u.cedula, u.nombres, u.telefono, u.direccion, u.usuario, t.tipousuario FROM usuarios u INNER JOIN tipousuario t ON (t.idtipousuario = u.idtipousuario) WHERE u.cedula = $id AND u.estado = 1");

        $result_sql = mysqli_num_rows($sql);
        if( $result_sql > 0){

            while( $data = mysqli_fetch_array($sql)){
                $nombres = $data['nombres'];
                $telefono = $data['telefono'];
                $direccion = $data['direccion'];
                $usuario = $data['usuario'];
                $tipousuario = $data['tipousuario'];
            }
        }else{
            header('location: listaTecnicos.php');
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
                <h1 class="text-decoration-underline fw-bold">Eliminar Registrar Técnico</h1>
            </div>
        </div>
        <div class="mt-5 row justify-content-center align-items-center">
            <div class="col-sm-12 col-md-12 col-lg-8">

                <div class="mt-3 col-md-4">
                    <div class="form-outline">
                        <i class="fa-solid fa-signature trailing"></i>         
                        <label for="nombres" id="nombres" class="form-label text-black fw-bold">Nombres: <span><?php echo $nombres; ?></span></label>
                    </div>
                </div>

                <div class="mt-3 col-md-4">
                    <div class="form-outline">
                        <i class="fa-solid fa-phone trailing"></i>             
                        <label for="telefono" id="telefono" class="form-label text-black fw-bold">Teléfono: <span><?php echo $telefono; ?></span></label>
                    </div>
                </div>

                <div class="mt-3 col-md-4">
                    <div class="form-outline">
                        <i class="fa-solid fa-route trailing"></i>
                        <label for="direccion" class="form-label text-black fw-bold">Dirección: <?php echo $direccion; ?></label>
                    </div>
                </div>

                <div class="mt-3 col-md-4">
                    <div class="form-outline">
                        <i class="fa-solid fa-user trailing"></i>       
                        <label for="usuario" class="form-label text-black fw-bold">Usuario: <span><?php echo $usuario; ?></span></label>
                    </div>
                </div>

                <div class="mt-3 col-md-4">
                    <div class="form-outline">
                        <i class="fa-solid fa-user-secret trailing"></i>
                        <label for="fechanacimiento" class="form-label text-black fw-bold">Tipo usuario: <?php echo $tipousuario; ?></label>
                    </div>
                </div>

                <form id="loginForm" action="" method="post" class="mb-4">
                    <div class="row">

                        <div class="mt-3 col-md-6" hidden>
                            <div class="form-outline">
                                <input type="text" name="cedula" readonly class="form-control fw-bold" value="<?php echo $id;?>">
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
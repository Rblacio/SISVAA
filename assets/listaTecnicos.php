<?php
session_start();
  require_once ('../conexion.php');

  if(empty($_SESSION['active']) || $_SESSION['tipousuario'] != 'Administrador' ){
    header('location: /SISVAA');
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
    // SELECT u.cedula, u.nombres, u.telefono, u.direccion, u.usuario, u.fechanacimiento, t.tiponombre FROM usuarios u INNER JOIN tipousuario t on (u.tipousuario = t.idtipousuario);
  ?>

  <div class="container">
    <div class="row">
      <div class="col-6 mt-3"><h1 class="text-decoration-underline fw-bold">Listado de Técnicos</h1></div>
      <div class="col-6 mt-4 text-end"><a href="./registroTecnicos.php">Crear registro</a></div>
    </div>
    <div class="mt-5 row justify-content-center align-items-center">
      <div class="col-sm-12 col-md-9 col-lg-12">
      <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
          <tr class="table-dark text-center">
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Usuario</th>
            <th>Fecha Nacimiento</th>
            <th>Tipo usuario</th>
            <th><i class="icon fa-brands fa-galactic-republic"></i> <br> Acciones</th>
          </tr>
        </thead>

        <?php

          $query = mysqli_query($conn, "SELECT u.cedula, u.nombres, u.telefono, u.direccion, u.usuario, u.fechanacimiento, u.idtipousuario, t.tipousuario FROM usuarios u INNER JOIN tipousuario t on (u.idtipousuario = t.idtipousuario) WHERE u.estado = 1  order by u.idtipousuario asc");
          $result = mysqli_num_rows($query);
          if($result > 0){
            while($row = mysqli_fetch_array($query)){
        ?>

        <tbody>
          <tr class="text-center">
            <td>
              <div class="d-flex align-items-center">
                <div class="ms-0">
                  <p class="fw-normal mb-0"><?php echo $row['cedula'] ?></p>
                </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['nombres']?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['telefono']?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['direccion']?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo$row['usuario'] ?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['fechanacimiento']?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['tipousuario']?></p>
            </td>
            <td>
              <?php
              
              if($row['idtipousuario']==1){
              ?>
                <a href="./modificarTecnicos.php?id=<?php echo $row['cedula'] ?>" class="btn-rounded bg-warning text-white btn-sm fw-bold">Editar</a>
              <?php
                }else{
              ?>
                <a href="./modificarTecnicos.php?id=<?php echo $row['cedula'] ?>" class="btn-rounded bg-warning text-white btn-sm fw-bold">Editar</a>
                <a href="./eliminarTecnicos.php?id=<?php echo $row['cedula'] ?>" class="btn-rounded bg-danger text-white btn-sm fw-bold">Borrar</a>
              <?php
                }
              ?>
            </td>
          </tr>
        </tbody>
        <?php

            }
          }
        ?>
      </table>
      </div>
    </div>
  </div>
  
  

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
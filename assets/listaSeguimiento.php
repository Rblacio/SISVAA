<?php
session_start();
  if(empty($_SESSION['active']) || $_SESSION['tipousuario'] != 'Administrador' ){
    header('location: /SISVAA');
  }
  require_once ('../conexion.php');

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
      <div class="col-12 mt-3"><h1 class="text-decoration-underline fw-bold">Seguimiento de Ordenes de trabajo</h1></div>
    </div>
    <div class="mt-5 row justify-content-center align-items-center">
      <div class="col-sm-12 col-md-9 col-lg-12">
      <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
          <tr class="table-dark text-center">
            <th>Cédula técnico</th>
            <th>Nombres técnico</th>
            <th>Cédula cliente</th>
            <th>Nombres cliente</th>
            <th>Titulo orden</th>
            <th>Costo $</th>
            <th>Imagen</th>
            <th>Fecha asignación</th>
            <th>Fecha Finalización</th>
            <th>Orden</th>
            <th><i class="icon fa-solid fa-fan"></i> <br> Estado</th>
          </tr>
        </thead>

        <?php

          $query = mysqli_query($conn, "SELECT o.idorden, o.cedulatecnico, u.nombres, o.cedulacliente, c.nombreCliente, o.titulOrden, o.costotrabajo, f.fotos, o.fechaasignacion, o.fechafinalizacion, t.Orden, o.estado, CASE o.estado when 1 then 'EN ESPERA' when 2 then 'EN PROCESO' when 3 then 'FINALIZADA' end as ESTADO FROM ordentrabajo o INNER JOIN usuarios u ON (u.cedula = o.cedulatecnico) INNER JOIN clientes c ON (c.cedulaCliente = o.cedulacliente) INNER JOIN tipoorden t ON (t.idtipoOrden = o.idtipoorden) LEFT JOIN fotos f ON (f.idfotos= o.foto) WHERE o.estado != 0 order by o.fechaasignacion ASC");
          $result = mysqli_num_rows($query);
          if($result > 0){
            while($row = mysqli_fetch_array($query)){
        ?>

        <tbody>
          <tr class="text-center">
            <td>
                <p class="fw-normal mb-0"><?php echo $row['cedulatecnico'] ?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['nombres']?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['cedulacliente']?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['nombreCliente']?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo$row['titulOrden'] ?></p>
            </td>
            <td>
              <p class="fw-normal mb-0">$ <?php echo $row['costotrabajo']?></p>
            </td>
            <td>
              <p class="fw-normal mb-0">
                <img src="data:image/jpg;base64, <?php echo base64_encode($row['fotos'])?>" width="100" alt="" srcset="">
              </p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['fechaasignacion']?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['fechafinalizacion']?></p>
            </td>
            <td>
              <p class="fw-normal mb-0"><?php echo $row['Orden']?></p>
            </td>
            <td>
            <?php
              if($row['estado']==1){
              ?>
                <p class="mb-0 fw-bold badge bg-danger text-wrap"><?php echo $row['ESTADO']?></p>
              <?php
                }else if($row['estado']==2){
              ?>
                <p class="mb-0 fw-bold badge bg-warning text-wrap"><?php echo $row['ESTADO']?></p>
              <?php
                }else if($row['estado']==3){
              ?>
                <p class="mb-0 fw-bold badge bg-success text-wrap"><?php echo $row['ESTADO']?></p>
            </td>
          </tr>
        </tbody>
        <?php
              }
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
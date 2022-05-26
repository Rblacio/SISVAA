<?php
  session_start();
  if(empty($_SESSION['active']) && $_SESSION['tipousuario'] == 'Administrador' ){
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
  ?>

  <div class="container cont">
      <div class="row text-center">
        <div class="col-lg-6">
          <img src="./img/asesoria_home_sisvaa.png" class="img-fluid" alt="" srcset="">
        </div>
        <div class="col-lg-6">
              <img src="./img/colum3.jpg" height="100px" class="img-fluid" alt="" srcset="">
          </div>
        <div class="col-lg-12 mt-2 mb-2">
          <p class="mensajeBienvenida">Bienvenid@ 
            <span class="fw-bold">
            <?php
              echo $_SESSION['nombres']; 
            ?>
            </span>
            <span> a</span> 
            <span class="siglasEmpresa">SISVAA</span>
          </p>
          <p><span>Ya puedes empesar a organizar tu trabajo de mejor calidad</span></p>
        </div>
        <div class="col-lg-4">
          <div class="fa mb-3"><i class="fa fa-solid fa-user-group "></i></div>
          <h6>Sobre Nosotros</h6>
          <p class="contenido">Somos un equipo de trabajo comprometido y eficiente, especializado en el diseño, fabricación, instalación y mantenimiento de sistemas HVAC, con más de 10 años de experiencia en el mercado nacional.</p>
        </div>
        <div class="col-lg-4">
          <div class="fa mb-3"><i class="fa fab fa-accessible-icon"></i></div>
          <h6>Misión</h6>
          <p class="contenido">Satisfacer a nuestros clientes con un excelente servicio, calidad y garantía, comprometidos con el bienestar de su salud y el medio ambiente</p>        
        </div>
        <div class="col-lg-4">
          <div class="fa mb-3"><i class="fa fa-solid fa-eye-low-vision"></i></div>
          <h6>Visión</h6>
          <p class="contenido">Convertirnos en la primera opción para soluciones de servicio integral de sistemas de climatización, aire acondicionado y ventilación mecánica a un precio competitivo, garantizando el confort de nuestro cliente.</p>
        </div>
      </div>
    </div>
  

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
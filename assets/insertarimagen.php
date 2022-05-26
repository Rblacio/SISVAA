<?php
session_start();
  require_once ('../conexion.php');

  $idOrden = $_POST['idOrden'];
  $fotos = addslashes(file_get_contents($_FILES['fotos']['tmp_name']));

  $query = "INSERT INTO Fotos (fotos, idOrden) VALUES ('$fotos','$idOrden')";

  $result = $conn->query($query);

  if($result){
      echo 'Se guardo';
    //header('location: listaSeguimiento.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form">
        <input type="file" name="fotos" id="fotos">
        <input type="text" name="idOrden" id="idOrden">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
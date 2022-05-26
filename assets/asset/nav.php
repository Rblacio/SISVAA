<?php
  if ($_SESSION['tipousuario'] == 'Administrador'){
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler"type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
        <i class="fas fa-bars"></i>   
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand mt-lg-0" href="./">
          <img src="img/sisvaa.png" height="50" alt="SISVAA Logo" loading="lazy"/>
        </a>
        <ul id="navbarList" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="./">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./listaTecnicos.php">Técnicos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./listaClientes.php">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./listaOrdenes.php">Orden de trabajo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./listaSeguimiento.php">Seguimiento</a>
          </li>
        </ul>
        <div class="d-flex align-items-center m-3">
        

          <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center text-dark hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <span class="m-0">
                <?php
                  echo $_SESSION['nombres'];
                ?>
              </span>
            </a>
            <ul id="listUser" class="dropdown-menu dropdown-menu-md-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuAvatar">
              <li>
                <a class="dropdown-item" href="#">Mi perfil</a>
              </li>
              <li>
                <a class="dropdown-item disabled" href="#">Herramientas</a>
              </li>
              <li>
                <a class="dropdown-item" href="../cerrarsesion.php">Cerrar sesión</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</nav>
<?php
  }else{
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler"type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
        <i class="fas fa-bars"></i>   
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class=""></div>
        <a class="navbar-brand mt-lg-0" href="./">
          <img src="img/sisvaa.png" height="50" alt="SISVAA Logo" loading="lazy"/>
        </a>
        <ul id="navbarList" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="./">Inicio</a>
          </li>

        </ul>
        <div class="d-flex align-items-center m-3">
          <div class="dropdown">
            <a class="dropdown-toggle d-flex align-items-center text-dark hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <span class="m-0">
                <?php
                  echo $_SESSION['nombres'];
                ?>
              </span>
            </a>
            <ul id="listUser" class="dropdown-menu dropdown-menu-md-start dropdown-menu-lg-end" aria-labelledby="navbarDropdownMenuAvatar">
              <li>
                <a class="dropdown-item" href="#">Mi perfil</a>
              </li>
              <li>
                <a class="dropdown-item disabled" href="#">Herramientas</a>
              </li>
              <li>
                <a class="dropdown-item" href="../cerrarsesion.php">Cerrar sesión</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</nav>
<?php
  }
?>

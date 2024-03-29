<?php
  session_start();

  if (empty($_SESSION)) {
      header('Location: ../../views/usuario/login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once('../../inc/head.php'); ?>
  <title>Agregar <b>zona</b> nueva</title>
</head>

<body>
  <div class="fixed-top shadow">
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
      <a class="navbar-brand font-weight-bold" href="../../index.php">AppCountancy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../../index.php">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item d-none">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item d-none">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 d-none">
          <input class="form-control mr-sm-2 d-none" type="search" placeholder="Search" aria-label="Search">
          <a href="../usuario/cerrar_sesion.php" tabindex="-1" class="btn btn-outline-danger"> Cerrar sesión</a>
        </form>
      </div>
    </nav>
  </div>


  <div class="container d-flex justify-content-center align-items-center flex-column mt-5 pt-5">
    <div class="row w-75 mb-3 flex-column">
      <div class="row mb-5">
        <div class="col d-flex align-items-center p-0">
          <a href="../usuario/index.php" class="fas fa-arrow-alt-circle-left text-primary btn"
            style="font-size: 1.8em;"> Volver</a>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
          <h1 class="mb-4 text-primary text-center">Crear zona nueva</h1>
        </div>
      </div>
    </div>

    <form class="w-50" action="../../controllers/ZonaController.php" method="post">
      <div class="form-group">
        <div class="form-group">
          <input name="nombreZona" type="text" class="form-control" id="nombreZona" placeholder="Nombre de la zona. Ejemplo: ZONA_1" required="required">
        </div>
        <div class="form-group">
          <input name="valorZona" type="number" class="form-control" id="valorZona" placeholder="Valor del domicilio" required="required">
        </div>
        <div class="form-group d-none">
          <input name="activoZona" type="text" class="form-control" id="activoZona" value="S">
        </div>
      </div>
      <input type="submit" name="logZona" value="Registrar zona nueva" class="btn btn-outline-primary font-weight-bold float-right mt-3">
    </form>
  </div>

  <?php include_once('../../inc/scripts.php'); ?>
</body>

</html>
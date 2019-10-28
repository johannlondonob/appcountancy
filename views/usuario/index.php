<?php
    session_start();

    if (empty($_SESSION)) {
        header('Location: ../../views/usuario/login.php');
    } else {
      $nombreUsuario = $_SESSION['primerNombreTercero'] . ' ' . $_SESSION['segundoNombreTercero'];
      $nombreRol = '(' . $_SESSION['nombreRol'] . ')';
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php include_once('../../inc/head.php'); ?>
  <title>AppCountancy</title>
</head>

<body>
  <div class="fixed-top shadow">
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
      <a class="navbar-brand font-weight-bold" href="../usuario/index.php">AppCountancy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../usuario/index.php">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item d-none">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item d-none">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2 d-none" type="search" placeholder="Search" aria-label="Search">
          <span class="mr-3 text-muted"> <?= $nombreUsuario ?></span> <span class="mr-3 text-muted"> <?= $nombreRol ?></span>
          <a href="../usuario/cerrar_sesion.php" tabindex="-1" class="btn btn-outline-danger"> Cerrar sesión</a>
        </form>
      </div>
    </nav>
  </div>
  <div class="container d-flex justify-content-center align-items-center flex-column mt-5 pt-5">
    <div class="row d-flex mb-5">
      <div class="col-lg-3 mb-4 mb-lg-0">
        <h2 class="text-warning"> Egresos </h2>
      </div>
      <div class="col-lg-9">
        <div class="card-deck">
          <div class="card text-center">
            <div class="d-flex justify-content-center p-4 text-primary" style="font-size: 4.5em;"> <i
                class="fas fa-cash-register"></i> </div>
            <div class="card-body">
              <h5 class="card-title"><a href="../egreso/nuevo_egreso.php" class="stretched-link text-decoration-none">Registrar un gasto</a></h5>
              <p class="card-text">He realizado un gasto y deseo registrarlo en el sistema para llevar un control</p>
            </div>
          </div>
          <div class="card text-center">
            <div class="d-flex justify-content-center p-4 text-primary" style="font-size: 4.5em;"> <i
                class="fas fa-book-reader"></i> </div>
            <div class="card-body">
              <h5 class="card-title"><a href="../../controllers/EgresoController.php?fn=selectAll" class="stretched-link text-decoration-none">Ver los gastos</a></h5>
              <p class="card-text">Deseo poder ver todos los gastos que he hecho. Me encargaré de cómo buscarlos.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row d-flex mb-5">
      <div class="col-lg-3 mb-4 mb-lg-0">
        <h2 class="text-warning"> Domicilios </h2>
      </div>
      <div class="col-lg-9">
        <div class="card-deck">
          <div class="card text-center">
            <div class="d-flex justify-content-center p-4 text-primary" style="font-size: 4.5em;"> <i class="fas fa-bicycle"></i> </div>
            <div class="card-body">
              <h5 class="card-title"><a href="../domicilio/nuevo_domicilio.php" class="stretched-link text-decoration-none">Registrar un domicilio</a></h5>
              <p class="card-text">Me han solicitado un domicilio. Deseo poder registrar los datos correspondientes.</p>
            </div>
          </div>
          <div class="card text-center">
            <div class="d-flex justify-content-center p-4 text-primary" style="font-size: 4.5em;"> <i
                class="fas fa-book-reader"></i> </div>
            <div class="card-body">
              <h5 class="card-title"><a href="../../controllers/DomicilioController.php?fn=selectAll" class="stretched-link text-decoration-none">Ver los domicilios</a></h5>
              <p class="card-text">Quiero ver todos los domicilios que se han hecho. Me encargaré de cómo buscarlos por fecha.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row d-flex mb-5">
      <div class="col-lg-3 mb-4 mb-lg-0">
        <h2 class="text-warning"> Cuadres Diarios </h2>
      </div>
      <div class="col-lg-9">
        <div class="card-deck">
          <div class="card text-center">
            <div class="d-flex justify-content-center p-4 text-primary" style="font-size: 4.5em;"> <i class="fas fa-clipboard-list"></i> </div>
            <div class="card-body">
              <h5 class="card-title"><a href="../egreso/nuevo_egreso.php" class="stretched-link text-decoration-none">Ralizar el cuadre diario </a></h5>
              <p class="card-text">Solo podré realizar el cuadre diario de hoy.</p>
              <small>Si no puedo, buscaré la persona administrador del sistema.</small>
            </div>
          </div>
          <div class="card text-center">
            <div class="d-flex justify-content-center p-4 text-primary" style="font-size: 4.5em;"> <i
                class="fas fa-book-reader"></i> </div>
            <div class="card-body">
              <h5 class="card-title"><a href="#" class="stretched-link text-decoration-none">Ver los cuadres diarios</a></h5>
              <p class="card-text">Buscaré todos los cuadres diarios realizados hasta hoy para ver con más detalles.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row d-flex mb-5">
      <div class="col-lg-3 mb-4 mb-lg-0">
        <h2 class="text-warning"> Mensajeros </h2>
      </div>
      <div class="col-lg-9">
        <div class="card-deck">
          <div class="card text-center">
            <div class="d-flex justify-content-center p-4 text-primary" style="font-size: 4.5em;"> <i class="fas fa-clipboard-list"></i> </div>
            <div class="card-body">
              <h5 class="card-title"><a href="../mensajero/nuevo_mensajero.php" class="stretched-link text-decoration-none">Registrar un nuevo mensajero </a></h5>
              <p class="card-text">Hay una persona que será un nuevo domiciliario.</p>
            </div>
          </div>
          <div class="card text-center">
            <div class="d-flex justify-content-center p-4 text-primary" style="font-size: 4.5em;"> <i
                class="fas fa-book-reader"></i> </div>
            <div class="card-body">
              <h5 class="card-title"><a href="#" class="stretched-link text-decoration-none">Ver todos los mensajeros</a></h5>
              <p class="card-text">Deseo ver todos los mensajeros que se encuentran trabajando en la empresa. </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row d-flex mb-5">
      <div class="col-lg-3 mb-4 mb-lg-0">
        <h2 class="text-warning"> Zonas </h2>
      </div>
      <div class="col-lg-9">
        <div class="card-deck">
          <div class="card text-center">
            <div class="d-flex justify-content-center p-4 text-primary" style="font-size: 4.5em;"> <i class="fas fa-globe"></i> </div>
            <div class="card-body">
              <h5 class="card-title"><a href="../zona/nueva_zona.php" class="stretched-link text-decoration-none">Registrar una nueva zona</a></h5>
              <p class="card-text">Quiero ingresar zona nueva para mis domicilios y así poder llevar un control de estos.</p>
            </div>
          </div>
          <div class="card text-center">
            <div class="d-flex justify-content-center p-4 text-primary" style="font-size: 4.5em;"> <i
                class="fas fa-book-reader"></i> </div>
            <div class="card-body">
              <h5 class="card-title"><a href="#" class="stretched-link text-decoration-none">Ver todas las zonas</a></h5>
              <p class="card-text">Deseo poder ver todas las zonas disponibles para los domicilios.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once('../../inc/scripts.php'); ?>
  <script>
  $(".card").hover(function(){
    $(this).toggleClass("shadow").css("transition","all .5s");
  });
  </script>
</body>

</html>

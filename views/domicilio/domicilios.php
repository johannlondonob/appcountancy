<?php
    session_start();

    if (empty($_SESSION)) {
        header('Location: ../../views/usuario/login.php');
    } else {
      $nombreUsuario = $_SESSION['primerNombreTercero'] . ' ' . $_SESSION['segundoNombreTercero'];
      $nombreRol =  $_SESSION['nombreRol'];
      $descripcionRol = $_SESSION['descripcionRol'];
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php include_once('../inc/head.php'); ?>

  <title>Domicilios</title>
</head>

<body>
  <div class="fixed-top shadow">
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
      <a class="navbar-brand font-weight-bold" href="../views/usuario/index.php">AppCountancy</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../views/usuario/index.php">Inicio <span class="sr-only">(current)</span></a>
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
          <span class="mr-3 text-muted"> <?= $nombreUsuario ?></span> <span class="mr-3 text-muted"
            title="<?= $descripcionRol ?>"> <?= $nombreRol ?></span>
          <a href="../views/usuario/cerrar_sesion.php" tabindex="-1" class="btn btn-outline-danger"> Cerrar sesión</a>
        </form>
      </div>
    </nav>
  </div>
  <div class="container-fluid d-flex justify-content-center align-items-center flex-column mt-4 pt-5 mb-5">
    <div class="row w-100 mb-3 flex-column">
      <div class="row">
        <div class="col d-flex align-items-center p-0">
          <a href="../views/usuario/index.php" class="fas fa-arrow-alt-circle-left text-primary btn"
            style="font-size: 1.8em;"> Volver</a>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
          <h1 class="text-primary text-center">Lista de domicilios</h1>
        </div>
      </div>
    </div>
    <div class="table-responsive table-responsive-md">
      <table id="tabla" class="table table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">Fecha domicilio</th>
            <th scope="col">Nro factura</th>
            <th scope="col">Valor</th>
            <th scope="col">Zona</th>
            <th scope="col">Mensajero</th>
            <th scope="col">Forma de pago</th>
            <th scope="col">Entrega dinero</th>
            <th scope="col">Observaciones</th>
            <?php if ($nombreRol == 'ADMIN') { ?>
            <th scope="col" class="text-center">Acciones</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($domicilio as $key) { ?>
          <tr>
            <td class="align-middle"><?= $key -> getFechaDomicilio() ?></td>
            <td class="align-middle"><?= $key -> getNroFactura() ?></td>
            <td class="align-middle"><?= $key -> getValorFactura() ?></td>
            <td class="align-middle"><?= $key -> getNombreZona() ?></td>
            <td class="align-middle"><?= $key -> getNombreMensajero() ?></td>
            <td class="align-middle"><?= $key -> getNombreMedioPago() ?></td>
            <td class="align-middle"><?= $key -> getFechaEntregaDomicilio() ?></td>
            <td class="align-middle"><?= $key -> getObservaciones() ?></td>
            <?php if($nombreRol == 'ADMIN') { ?>
            <td class="text-center align-middle"><a class="btn btn-sm btn-primary m-1 "
                href="DomicilioController.php?fn=update&id=<?= $key -> getIdDomicilio()?>">Actualizar</a><a
                class="btn btn-sm btn-warning m-1"
                href="DomicilioController.php?fn=update&id=<?= $key -> getIdDomicilio()?>">Eliminar</a>
            </td>
            <?php } ?>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

  </div>

  <?php include_once('../inc/scripts.php'); ?>
</body>

</html>
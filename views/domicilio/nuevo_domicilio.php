<?php
    require_once '../../config/Db.php';
    require_once '../../models/ReporteMensajero.php';
    require_once '../../models/ZonaModel.php';
    require_once '../../models/FormaPagoModel.php';
    session_start();

    if (empty($_SESSION)) {
        header('Location: ../../views/usuario/login.php');
    }

    $mensajero = new ReporteMensajero();
    $zona = new ZonaModel();
    $formaPago = new FormaPagoModel();

    $mensajero = $mensajero->SelectAll();
    $zona = $zona->SelectAll();
    $formaPago = $formaPago->SelectAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once '../../inc/head.php' ?>
    <title>Registra un domicilio</title>
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
                        <a class="nav-link" href="../usuario/index.php">Inicio <span
                                class="sr-only">(current)</span></a>
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
                    <a href="../usuario/cerrar_sesion.php" tabindex="-1" class="btn btn-outline-danger"> Cerrar
                        sesión</a>
                </form>
            </div>
        </nav>
    </div>
    <div class="container d-flex justify-content-center align-items-center flex-column mt-5 pt-5 mb-5">
        <div class="row w-75 mb-3 flex-column">
            <div class="row mb-5">
                <div class="col d-flex align-items-center p-0">
                    <a href="../usuario/index.php" class="fas fa-arrow-alt-circle-left text-primary btn" style="font-size: 1.8em;"> Volver</a>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <h1 class="text-primary text-center">Registrar nuevo domicilio</h1>
                </div>
            </div>
        </div>
        <div class="row w-75">
            <div class="col">
                <p class="text-center"> <b> Registra el domicilio que se ha realizado el día de hoy, <span class="text-warning"> <?= date('d M Y') ?> </span> </b> </p>
            </div>
        </div>

        <form class="w-75" action="../../controllers/DomicilioController.php" method="post">

            <div class="row my-lg-3">
                <div class="col-lg-6 d-none">
                    <input name="fechaDomicilio" type="date" value="<?= date('Y-m-d') ?>" class="form-control">
                </div>
                <div class="col-lg-6">
                    <input name="nroFacturaDomicilio" type="number" class="form-control"
                        placeholder="Número de la factura del domicilio" required>
                    <br class="d-lg-none">
                </div>
                <div class="col-lg-6">
                    <input name="valorFacturaDomicilio" type="number" class="form-control" placeholder="Valor factura"
                        required>
                    <br class="d-lg-none">
                </div>
            </div>
            <div class="row my-lg-3">
                <div class="col-lg-6">
                    <select name="zonaDomicilio" id="zonaDomicilio" class="form-control" required>
                        <option value="">Seleccione la zona del domicilio</option>
                        <?php foreach ($zona as $key) { ?>
                        <option value="<?= $key->getIdZona() ?>"><?= $key->getNombreZona() ?></option>
                        <?php } ?>
                    </select>
                    <br class="d-lg-none">
                    <!-- <input name="zonaDomicilio" type="text" class="form-control" placeholder="Zona del domicilio" required> -->

                </div>
                <div class="col-lg-6">
                    <select name="mensajeroDomicilio" id="mensajeroDomicilio" class="form-control" required>
                        <option value="">Seleccione el mensajero</option>
                        <?php foreach ($mensajero as $key) { ?>
                        <option value="<?= $key->getIdMensajero() ?>">
                            <?= $key->getNombresMensajero().' '.$key->getApellidosMensajero() ?></option>
                        <?php } ?>
                    </select>
                    <br class="d-lg-none">
                    <!-- <input name="mensajeroDomicilio" type="text" class="form-control" placeholder="Nombre del mensajero" required> -->
                </div>
            </div>
            <div class="row my-lg-3">
                <div class="col-lg-6">
                    <select name="formaPagoDomicilio" id="formaPagoDomicilio" class="form-control" required>
                        <option value="">Seleccione el medio de pago utilizado</option>
                        <?php foreach ($formaPago as $key) { ?>
                        <option value="<?= $key->getIdFormaPago() ?>"><?= $key->getNombrePago()?></option>
                        <?php } ?>
                    </select>
                    <br class="d-lg-none">
                    <!-- <input name="formaPagoDomicilio" type="text" class="form-control" placeholder="Medio de pago" required> -->

                </div>
                <div class="col-lg-6">
                    <input name="fechaEntregaDineroDomicilio" type="date" class="form-control" placeholder="">
                    <br class="d-lg-none">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <textarea name="observacionDomicilio" type="text" class="form-control"
                        placeholder="Observaciones"></textarea>
                </div>

            </div>
            <input type="submit" name="logDomicilio" value="Registrar Domicilio"
                class="btn btn-outline-primary font-weight-bold float-right mt-3">
        </form>
    </div>

    <?php include_once '../../inc/scripts.php' ?>
</body>

</html>
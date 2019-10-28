<?php 
    session_start();

    if (empty($_SESSION)) {
        header('Location: ../../views/usuario/login.php');
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once '../../inc/head.php' ?>
    <title>Registra un gasto</title>
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
                    <!-- <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Módulos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Cuadres diarios</a>
                            <a class="dropdown-item" href="../egreso/nuevo_egreso.php">Egresos</a>
                            <div class="dropdown-divider d-none"></div>
                            <a class="dropdown-item" href="#">Domicilios</a>
                            <a class="dropdown-item" href="#">Zonas</a>
                        </div>
                    </li> -->
                    <li class="nav-item d-none">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
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
                    <a href="../usuario/index.php" class="fas fa-arrow-alt-circle-left text-primary btn" style="font-size: 1.8em;"> Volver</a>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <h1 class="text-primary text-center"> Registrar un gasto </h1>
                </div>
            </div>
        </div>
        <div class="row w-75">
            <div class="col">
                <p class="text-center"> <b> Registra el gasto que has realizado el día de hoy, <span class="text-warning"> <?= date('d M Y') ?> </span> </b> </p>
            </div>
        </div>
        <form class="w-75" action="../../controllers/EgresoController.php" method="post">

            <div class="row">
                <div class="col-lg-6 d-none">
                    <input name="fechaGasto" type="date" value="<?= date('Y-m-d') ?>" class="form-control">
                </div>
                <div class="col-lg-6">
                    <input name="conceptoGasto" type="text" class="form-control" placeholder="Concepto del gasto"
                        required>
                    <br class="d-lg-none">
                </div>
                <div class="col-lg-6">
                    <input name="valorGasto" type="number" class="form-control" placeholder="Valor del gasto" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <textarea name="observacionGasto" type="text" class="form-control"
                        placeholder="Observaciones"></textarea>
                </div>

            </div>
            <input type="submit" name="logGasto" value="Registrar gasto"
                class="btn btn-outline-primary font-weight-bold float-right mt-3">
        </form>
    </div>

    <?php include_once '../../inc/scripts.php' ?>
</body>

</html>
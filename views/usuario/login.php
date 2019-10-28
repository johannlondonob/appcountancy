<?php
    session_start();
    session_destroy();
    $titlePage = 'LogIn';
    include_once '../common/head.php';
?>

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


    <div class="container vh-100 d-flex justify-content-center align-items-center flex-column">
        <h1 class="mb-5 text-primary text-center">Iniciar sesión en AppCountancy</h1>
        <form class="w-50" action="../../controllers/UsuarioController.php" method="post">
            <div class="form-group">
                <label for="cuentaUsuario" class="font-weight-bold">Usuario</label>
                <input name="cuentaUsuario" type="text" class="form-control" id="cuentaUsuario"
                    placeholder="Digita el usuario" required="required">
            </div>
            <div class="form-group">
                <label for="claveUsuario" class="font-weight-bold">Clave</label>
                <input name="claveUsuario" type="password" class="form-control" id="claveUsuario"
                    placeholder="Digita la clave" required="required">
            </div>
            <div class="form-group form-check d-none">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <input type="submit" name="logIn" value="Iniciar sesión"
                class="btn btn-outline-primary font-weight-bold float-right mt-3">
        </form>
    </div>

    <?php include_once('../common/bootstrapJS.php'); ?>
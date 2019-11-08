<?php $titlePage = 'Inicio';?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include_once 'views/common/head.php'; ?>
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
                <!-- <form class="form-inline my-2 my-lg-0" action="" method="post">
                    <div class="btn-group dropleft">
                        <div class="dropdown ">
                            <button class="btn btn-outline-success dropdown-toggle" type="button" id="iniciarSesion"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Iniciar sesión
                            </button>
                            <div class="dropdown-menu p-3" aria-labelledby="iniciarSesion">
                                <form action="" method="post" class="dropdown-menu">
                                    <div class="form-group mb-3">
                                        <input name="usuario" id="usuario" type="text" class="form-control"
                                            placeholder="Usuario">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input name="clave" id="clave" type="password" class="form-control"
                                            placeholder="Clave">
                                    </div>
                                </form>
                                <button id="registroUsuario" class="btn btn-outline-primary col-12"
                                    type="">¡Empezar!</button>
                            </div>
                        </div>
                    </div>
                </form> -->
            </div>
        </nav>
    </div>

    <div class="container mt-5 pt-5">
        <section class="w-50 m-auto">
            <div id="tituloFormularioIngresar" class="display-4 mb-3">Ingresar</div>
            <form action="" method="post" class="">
                <div class="form-group mb-3">
                    <input name="usuario" id="usuario" type="text" class="form-control" placeholder="Usuario">
                </div>
                <div class="form-group mb-3">
                    <input name="clave" id="clave" type="password" class="form-control" placeholder="Clave">
                </div>
            </form>
            <button id="registroUsuario" class="btn btn-outline-primary col-12" type="">¡Empezar!</button>
        </section>
    </div>
</body>
<script src="assets/jquery/js/jquery-3.4.1.min.js"></script>
<script src="assets/bootstrap/js/popper.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/site.js"></script>

</html>
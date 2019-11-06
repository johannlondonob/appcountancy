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
            <?php if (empty($_SESSION)) { ?>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 d-none" type="search" placeholder="Search" aria-label="Search">
                <a href="../views/usuario/login.php" tabindex="-1" class="btn btn-primary"> Iniciar sesión</a>
            </form>
            <?php } else { ?>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 d-none" type="search" placeholder="Search" aria-label="Search">
                <span class="mx-3"> <?= $_SESSION['nombreRol'] ?></span>
                <a href="../views/usuario/cerrar_sesion.php" tabindex="-1" class="btn btn-danger"> Cerrar sesión</a>
            </form>
            <?php } ?>
        </div>
    </nav>
</div>
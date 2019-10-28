<?php

session_start();

session_destroy();

echo "Salió de la sesion";
header("Location: ../usuario/login.php");

?>
<?php
    require_once('../config/Db.php');
    require_once('../models/UsuarioModel.php');
    require_once('../models/TerceroModel.php');
    require_once('../models/RolModel.php');
    session_start();

    $usuario = new UsuarioModel();
    $tercero = new TerceroModel();
    $rol = new RolModel();
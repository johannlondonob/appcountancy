<?php
  session_start();
  $titlePage = 'Bienvenido';

  if (! isset($_SESSION) || empty($_SESSION) || ! $_SESSION != null) {
      header('Location: ../../../../index.php');
  }

  include_once '../../views/common/head.php';
  include_once '../../views/common/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  
</body>
</html>  
<?php
  session_start();
  $titlePage = 'Bienvenido';

  if (! isset($_SESSION) || empty($_SESSION) || ! $_SESSION != null) {
      header('Location: ../../../../index.php');
  }

  include_once '../../views/common/head.php';
  include_once '../../views/common/navbar.php';
  include_once '../../views/common/app_head.php';
?>

/**
 * A partir de aquí se dibujará la información procesada.
 */

<?php
  include_once '../../views/common/app_footer.php';
  include_once '../../views/common/bootstrapJS.php';
?> 
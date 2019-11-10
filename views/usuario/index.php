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
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita modi odit aliquam! Eaque facere molestias officia iusto fugit asperiores magni illo esse incidunt fuga atque minima omnis totam, dolorum architecto.</p>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita modi odit aliquam! Eaque facere molestias officia iusto fugit asperiores magni illo esse incidunt fuga atque minima omnis totam, dolorum architecto.</p>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita modi odit aliquam! Eaque facere molestias officia iusto fugit asperiores magni illo esse incidunt fuga atque minima omnis totam, dolorum architecto.</p>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita modi odit aliquam! Eaque facere molestias officia iusto fugit asperiores magni illo esse incidunt fuga atque minima omnis totam, dolorum architecto.</p>

<?php include_once '../../views/common/app_footer.php'; ?> 
<?php
require 'includes/app.php';
includeTemplate('header');
?>

<main class="section container">
  <h1>Casas y Departamentos en Venta</h1>

  <?php
  $limit = 10;
  include 'includes/templates/announcement.php';
  ?>
</main>

<?php
includeTemplate('footer');
?>
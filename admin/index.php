<?php
$created = $_GET['created'] ?? null;

require '../includes/functions.php';
includeTemplate('header');
?>

<main class="container section">
  <h1>Administrador de bienes raíces</h1>

  <?php if (intval($created) === 1) : ?>
    <div class="alert alertSuccess">
      <p>Anuncio creado correctamente</p>
    </div>
  <?php endif; ?>

  <a href="/bienes-raices/admin/estate/create.php" class="btnGreen">Nueva Propiedad</a>
</main>

<?php includeTemplate('footer') ?>
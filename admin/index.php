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

  <table class="estates">
    <thead>
      <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td>1</td>
        <td>Casa en la playa</td>
        <td><img src="/bienes-raices/images/5c3f7b96de4e4da036b0468a22b564b6.jpg" class="tableImage" alt="imagen table"></td>
        <td>$1234000</td>
        <td>
          <a class="btnRed-block" href="#">Eliminar</a>
          <a class="btnYellow-block" href="#">Actualizar</a>
        </td>
      </tr>
    </tbody>
  </table>
</main>

<?php includeTemplate('footer') ?>
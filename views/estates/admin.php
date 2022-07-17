<main class="container section">
  <h1>Administrador de bienes raíces</h1>

  <?php
  if ($status) {
    $message = showNotification(intval($status));
    if ($message) {
  ?>
      <div class="alert alertSuccess">
        <p><?php echo s($message) ?></p>
      </div>
  <?php
    }
  }
  ?>

  <a href="/bienes-raices/admin/estate/create.php" class="btnGreen">Nueva Propiedad</a>
  <a href="/bienes-raices/admin/seller/create.php" class="btnYellow">Nuevo Vendedor(a)</a>

  <h2>Propiedades</h2>
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
      <?php foreach ($estates as $estate) : ?>
        <tr>
          <td><?php echo $estate->id; ?></td>
          <td><?php echo $estate->title; ?></td>
          <td><img src="./images/<?php echo $estate->image; ?>" class="tableImage" alt="imagen table"></td>
          <td>$<?php echo $estate->price; ?></td>
          <td>
            <form method="POST">
              <input type="hidden" name="id" value="<?php echo $estate->id ?>">
              <input type="hidden" name="type" value="estate">
              <input type="submit" class="btnRed-block w100" value="Eliminar" />
            </form>
            <a class="btnYellow-block" href="/admin/estate/update.php?id=<?php echo $estate->id; ?>">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
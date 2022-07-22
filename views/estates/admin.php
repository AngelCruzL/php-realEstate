<main class="container section">
  <h1 data-cy="adminHeading">Administrador de bienes raíces</h1>

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

  <a href="/propiedades/crear" class="btnGreen">Nueva Propiedad</a>
  <a href="/vendedores/crear" class="btnYellow">Nuevo Vendedor(a)</a>

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
            <form method="POST" action="/propiedades/eliminar">
              <input type="hidden" name="id" value="<?php echo $estate->id ?>">
              <input type="hidden" name="type" value="estate">
              <input type="submit" class="btnRed-block w100" value="Eliminar" />
            </form>
            <a class="btnYellow-block" href="/propiedades/actualizar?id=<?php echo $estate->id; ?>">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <h2>Vendedores</h2>
  <table class="estates">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($sellers as $seller) : ?>
        <tr>
          <td><?php echo $seller->id; ?></td>
          <td><?php echo $seller->firstname . ' ' . $seller->lastname; ?></td>
          <td><?php echo $seller->phone; ?></td>
          <td>
            <form method="POST" action="/vendedores/eliminar">
              <input type="hidden" name="id" value="<?php echo $seller->id ?>">
              <input type="hidden" name="type" value="seller">
              <input type="submit" class="btnRed-block w100" value="Eliminar" />
            </form>
            <a class="btnYellow-block" href="/vendedores/actualizar?id=<?php echo $seller->id; ?>">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
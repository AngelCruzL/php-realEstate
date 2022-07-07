<?php
require '../includes/config/database.php';
$db = dbConnection();

$getEstatesQuery = "SELECT * FROM estates";
$estates = mysqli_query($db, $getEstatesQuery);

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
      <?php while ($estate = mysqli_fetch_assoc($estates)) : ?>
        <tr>
          <td><?php echo $estate['id']; ?></td>
          <td><?php echo $estate['title']; ?></td>
          <td><img src="/bienes-raices/images/<?php echo $estate['image']; ?>" class="tableImage" alt="imagen table"></td>
          <td>$<?php echo $estate['price']; ?></td>
          <td>
            <a class="btnRed-block" href="#">Eliminar</a>
            <a class="btnYellow-block" href="#">Actualizar</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</main>

<?php
mysqli_close($db);
includeTemplate('footer')
?>
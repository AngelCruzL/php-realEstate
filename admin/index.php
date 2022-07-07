<?php
require '../includes/app.php';

isAuthenticated();

$db = dbConnection();

$getEstatesQuery = "SELECT * FROM estates";
$estates = mysqli_query($db, $getEstatesQuery);

$status = $_GET['status'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if ($id) {
    $getEstateImageQuery = "SELECT image FROM estates WHERE id = ${id};";
    $result = mysqli_query($db, $getEstateImageQuery);
    $estateImage = mysqli_fetch_assoc($result);
    unlink('../images/' . $estateImage['image']);

    $deleteQuery = "DELETE FROM estates WHERE id = ${id};";
    $deleteEstate = mysqli_query($db, $deleteQuery);

    if ($deleteEstate) header('Location: /bienes-raices/admin?status=3');
  }
}

includeTemplate('header');
?>

<main class="container section">
  <h1>Administrador de bienes raíces</h1>

  <?php if (intval($status) === 1) : ?>
    <div class="alert alertSuccess">
      <p>Anuncio creado correctamente</p>
    </div>
  <?php elseif (intval($status) === 2) : ?>
    <div class="alert alertSuccess">
      <p>Anuncio actualizado correctamente</p>
    </div>
  <?php elseif (intval($status) === 3) : ?>
    <div class="alert alertSuccess">
      <p>Anuncio eliminado correctamente</p>
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
            <form method="POST">
              <input type="hidden" name="id" value="<?php echo $estate['id'] ?>">
              <input type="submit" class="btnRed-block w100" value="Eliminar" />
            </form>
            <a class="btnYellow-block" href="/bienes-raices/admin/estate/update.php?id=<?php echo $estate['id']; ?>">Actualizar</a>
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
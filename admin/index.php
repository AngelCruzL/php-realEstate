<?php
require '../includes/app.php';
isAuthenticated();

use App\Estate;
use App\Seller;

$estates = Estate::all();
$sellers = Seller::all();

$status = $_GET['status'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = $_POST['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if ($id) {
    $content_type = $_POST['type'];

    if (validateContentType($content_type)) {
      if ($content_type === 'estate') {
        $estate = Estate::find($id);
        $estate->delete();
      } else if ($content_type === 'seller') {
        $seller = Seller::find($id);
        $seller->delete();
      }
    }
  }
}

includeTemplate('header');
?>

<main class="container section">
  <h1>Administrador de bienes raíces</h1>

  <?php if (!is_null($status)) : ?>
    <div class="alert alertSuccess">
      <?php if (intval($status) === 1) : ?>
        <p>Anuncio creado correctamente</p>
      <?php elseif (intval($status) === 2) : ?>
        <p>Anuncio actualizado correctamente</p>
      <?php elseif (intval($status) === 3) : ?>
        <p>Anuncio eliminado correctamente</p>
      <?php endif; ?>
    </div>
  <?php endif; ?>

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
          <td><img src="/bienes-raices/images/<?php echo $estate->image; ?>" class="tableImage" alt="imagen table"></td>
          <td>$<?php echo $estate->price; ?></td>
          <td>
            <form method="POST">
              <input type="hidden" name="id" value="<?php echo $estate->id ?>">
              <input type="hidden" name="type" value="estate">
              <input type="submit" class="btnRed-block w100" value="Eliminar" />
            </form>
            <a class="btnYellow-block" href="/bienes-raices/admin/estate/update.php?id=<?php echo $estate->id; ?>">Actualizar</a>
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
            <form method="POST">
              <input type="hidden" name="id" value="<?php echo $seller->id ?>">
              <input type="hidden" name="type" value="seller">
              <input type="submit" class="btnRed-block w100" value="Eliminar" />
            </form>
            <a class="btnYellow-block" href="/bienes-raices/admin/seller/update.php?id=<?php echo $seller->id; ?>">Actualizar</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>

<?php
mysqli_close($db);
includeTemplate('footer')
?>
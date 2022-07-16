<?php
require '../../includes/app.php';
isAuthenticated();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) header('Location: /bienes-raices/admin');

use App\Seller;

$seller = Seller::find($id);

$errors = Seller::getErrors();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $args = $_POST['seller'];

  $seller->sync($args);
  $errors = $seller->validateData();

  if (empty($errors)) {
    $seller->save();
  }
}

includeTemplate('header');
?>

<main class="container section">
  <h1>Actualizar Vendedor(a)</h1>

  <a href="/bienes-raices/admin" class="btnGreen">Volver</a>

  <?php foreach ($errors as $error) : ?>
    <div class="alert alertError">
      <p><?php echo $error; ?></p>
    </div>
  <?php endforeach; ?>

  <form class="form" method="POST">
    <?php include '../../includes/templates/form_sellers.php'; ?>

    <input type="submit" class="btnGreen" value="Guardar cambios">
  </form>
</main>

<?php includeTemplate('footer') ?>
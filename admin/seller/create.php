<?php
require '../../includes/app.php';
isAuthenticated();

use App\Seller;

$seller = new Seller;
$errors = Seller::getErrors();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $seller = new Seller($_POST['seller']);

  $errors = $seller->validateData();

  if (empty($errors)) {
    $seller->save();
  }
}

includeTemplate('header');
?>

<main class="container section">
  <h1>Registrar Vendedor(a)</h1>

  <a href="/bienes-raices/admin" class="btnGreen">Volver</a>

  <?php foreach ($errors as $error) : ?>
    <div class="alert alertError">
      <p><?php echo $error; ?></p>
    </div>
  <?php endforeach; ?>

  <form class="form" action="/bienes-raices/admin/seller/create.php" method="POST">
    <?php include '../../includes/templates/form_sellers.php'; ?>

    <input type="submit" class="btnGreen" value="Registrar vendedor(a)">
  </form>
</main>

<?php includeTemplate('footer') ?>
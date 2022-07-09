<?php
require '../../includes/app.php';
isAuthenticated();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) header('Location: /bienes-raices/admin');

use App\Estate;
use Intervention\Image\ImageManagerStatic as Image;

$estate = Estate::find($id);

$getSellersQuery = "SELECT * FROM sellers";
$sellers = mysqli_query($db, $getSellersQuery);

$errors = Estate::getErrors();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $args = $_POST['estate'];

  $estate->sync($args);
  $errors = $estate->validateData();

  $imageName = md5(uniqid(rand(), true)) . '.jpg';

  if ($_FILES['estate']['tmp_name']['image']) {
    $image = Image::make($_FILES['estate']['tmp_name']['image'])->fit(800, 600);
    $estate->setImage($imageName);
  }

  if (empty($errors)) {
    $image->save(IMAGES_DIRECTORY . $imageName);
    $estate->save();
  }
}

includeTemplate('header');
?>

<main class="container section">
  <h1>Actualizar</h1>

  <a href="/bienes-raices/admin" class="btnGreen">Volver</a>

  <?php foreach ($errors as $error) : ?>
    <div class="alert alertError">
      <p><?php echo $error; ?></p>
    </div>
  <?php endforeach; ?>

  <form class="form" method="POST" enctype="multipart/form-data">
    <?php include '../../includes/templates/form_estates.php'; ?>

    <input type="submit" class="btnGreen" value="Actualizar propiedad">
  </form>
</main>

<?php includeTemplate('footer') ?>
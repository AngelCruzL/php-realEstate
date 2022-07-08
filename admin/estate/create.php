<?php
require '../../includes/app.php';
isAuthenticated();

use App\Estate;
use Intervention\Image\ImageManagerStatic as Image;

$db = dbConnection();

$estate = new Estate;

$getSellersQuery = "SELECT * FROM sellers";
$sellers = mysqli_query($db, $getSellersQuery);

$errors = Estate::getErrors();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $estate = new Estate($_POST['estate']);

  $imageName = md5(uniqid(rand(), true)) . '.jpg';

  if ($_FILES['estate']['tmp_name']['image']) {
    $image = Image::make($_FILES['estate']['tmp_name']['image'])->fit(800, 600);
    $estate->setImage($imageName);
  }

  $errors = $estate->validateData();

  if (empty($errors)) {
    if (!is_dir(IMAGES_DIRECTORY)) mkdir(IMAGES_DIRECTORY);
    $image->save(IMAGES_DIRECTORY . $imageName);

    $result =  $estate->saveDB();
    if ($result) header('Location: /bienes-raices/admin?status=1');
  }
}

includeTemplate('header');
?>

<main class="container section">
  <h1>Crear</h1>

  <a href="/bienes-raices/admin" class="btnGreen">Volver</a>

  <?php foreach ($errors as $error) : ?>
    <div class="alert alertError">
      <p><?php echo $error; ?></p>
    </div>
  <?php endforeach; ?>

  <form class="form" action="/bienes-raices/admin/estate/create.php" method="POST" enctype="multipart/form-data">
    <?php include '../../includes/templates/form_estates.php'; ?>

    <input type="submit" class="btnGreen" value="Crear propiedad">
  </form>
</main>

<?php includeTemplate('footer') ?>
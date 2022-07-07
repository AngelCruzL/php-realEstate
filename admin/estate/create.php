<?php
require '../../includes/app.php';
isAuthenticated();

use App\Estate;
use Intervention\Image\ImageManagerStatic as Image;

$db = dbConnection();

$getSellersQuery = "SELECT * FROM sellers";
$sellers = mysqli_query($db, $getSellersQuery);

$errors = Estate::getErrors();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $estate = new Estate($_POST);

  $imageName = md5(uniqid(rand(), true)) . '.jpg';

  if ($_FILES['image']['tmp_name']) {
    $image = Image::make($_FILES['image']['tmp_name'])->fit(800, 600);
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
    <fieldset>
      <legend>Información general</legend>

      <label for="title">Título:</label>
      <input type="text" id="title" name="title" value="<?php echo $_POST['title']; ?>" placeholder="Título de la propiedad">

      <label for="price">Precio:</label>
      <input type="number" id="price" name="price" value="<?php echo $_POST['price']; ?>" placeholder="Precio de la propiedad">

      <label for="image">Imagen:</label>
      <input type="file" accept="image/jpeg, image/png" id="image" name="image">

      <label for="description">Descripción:</label>
      <textarea name="description" id="description"><?php echo $_POST['description']; ?></textarea>
    </fieldset>

    <fieldset>
      <legend>Información de la Propiedad</legend>

      <label for="bedrooms">Habitaciones:</label>
      <input type="number" id="bedrooms" name="bedrooms" value="<?php echo $_POST['bedrooms']; ?>" placeholder="Ej: 3">

      <label for="bathrooms">Baños:</label>
      <input type="number" id="bathrooms" name="bathrooms" value="<?php echo $_POST['bathrooms']; ?>" placeholder="Ej: 3">

      <label for="park">Estacionamiento:</label>
      <input type="number" id="park" name="park" value="<?php echo $_POST['park']; ?>" placeholder="Ej: 3">
    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>

      <select name="seller_id">
        <option value="" disabled selected>--Seleccione un vendedor--</option>
        <?php while ($seller = mysqli_fetch_assoc($sellers)) : ?>
          <option <?php echo $_POST['seller_id'] === $seller['id'] ? 'selected' : ''; ?> value="<?php echo $seller['id']; ?>">
            <?php echo $seller['firstname'] . " " . $seller['lastname']; ?>
          </option>
        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" class="btnGreen" value="Crear propiedad">
  </form>
</main>

<?php includeTemplate('footer') ?>
<?php
require '../../includes/functions.php';
$isAuth = isAuthenticated();
if (!$isAuth) header('Location: /bienes-raices/login.php');

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) header('Location: /bienes-raices/admin');

require '../../includes/config/database.php';
$db = dbConnection();

$getEstateQuery = "SELECT * FROM estates WHERE id = ${id}";
$estate = mysqli_query($db, $getEstateQuery);
$estate = mysqli_fetch_assoc($estate);

$getSellersQuery = "SELECT * FROM sellers";
$sellers = mysqli_query($db, $getSellersQuery);

$errors = [];

$title = $estate['title'] ?? null;
$price = $estate['price'] ?? null;
$description = $estate['description'] ?? null;
$bedrooms = $estate['bedrooms'] ?? null;
$bathrooms = $estate['bathrooms'] ?? null;
$park = $estate['park'] ?? null;
$seller_id = $estate['seller_id'] ?? null;

$maxImageSize = 1000 * 1000; // (1mb)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $bedrooms = mysqli_real_escape_string($db, $_POST['bedrooms']);
  $bathrooms = mysqli_real_escape_string($db, $_POST['bathrooms']);
  $park = mysqli_real_escape_string($db, $_POST['park']);
  $seller_id = mysqli_real_escape_string($db, $_POST['seller_id']);
  $created_at = date('Y/m/d');

  $image = $_FILES['image'];

  if (empty($title)) $errors[] = 'El título es obligatorio';
  if (empty($price)) $errors[] = 'El precio es obligatorio';
  if (strlen($description) < 50) $errors[] = 'La descripción debe tener al menos 50 caracteres';
  if (empty($bedrooms)) $errors[] = 'El número de habitaciones es obligatorio';
  if (empty($bathrooms)) $errors[] = 'El número de baños es obligatorio';
  if (empty($park)) $errors[] = 'El número de lugares de estacionamiento es obligatorio';
  if (empty($seller_id)) $errors[] = 'El vendedor es obligatorio';
  if ($image['size'] > $maxImageSize) $errors[] = 'La imagen es demasiado grande';

  if (empty($errors)) {
    $imageName = '';
    $imagesDirectory = '../../images/';

    if (!is_dir($imagesDirectory)) mkdir($imagesDirectory);

    if ($image['name']) {
      // ? Delete previous image if it exists
      unlink($imagesDirectory . $estate['image']);

      $imageName = md5(uniqid(rand(), true)) . '.jpg';
      move_uploaded_file($image['tmp_name'], $imagesDirectory .  $imageName);
    } else {
      $imageName = $estate['image'];
    }

    $updateQuery = "UPDATE estates
    SET title = '${title}',
      price = '${price}',
      image = '${imageName}',
      description = '${description}',
      bedrooms = ${bedrooms},
      bathrooms = ${bathrooms},
      park = ${park},
      seller_id = ${seller_id}
    WHERE id = ${id}";

    $result = mysqli_query($db, $updateQuery);

    if ($result) header('Location: /bienes-raices/admin?status=2');
  }
}

includeTemplate('header');
?>

<main class="container section">
  <h1>Actualizar</h1>

  <a href="/bienes-raices/admin" class="btnGreen">Volver</a>

  <form class="form" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>Información general</legend>

      <label for="title">Título:</label>
      <input type="text" id="title" name="title" value="<?php echo $title; ?>" placeholder="Título de la propiedad">

      <label for="price">Precio:</label>
      <input type="number" id="price" name="price" value="<?php echo $price; ?>" placeholder="Precio de la propiedad">

      <label for="image">Imagen:</label>
      <input type="file" accept="image/jpeg, image/png" id="image" name="image">
      <img src="/bienes-raices/images/<?php echo $estate['image'] ?>" alt="" class="imageSmall">

      <label for="description">Descripción:</label>
      <textarea name="description" id="description"><?php echo $description; ?></textarea>
    </fieldset>

    <fieldset>
      <legend>Información de la Propiedad</legend>

      <label for="bedrooms">Habitaciones:</label>
      <input type="number" id="bedrooms" name="bedrooms" value="<?php echo $bedrooms; ?>" placeholder="Ej: 3">

      <label for="bathrooms">Baños:</label>
      <input type="number" id="bathrooms" name="bathrooms" value="<?php echo $bathrooms; ?>" placeholder="Ej: 3">

      <label for="park">Estacionamiento:</label>
      <input type="number" id="park" name="park" value="<?php echo $park; ?>" placeholder="Ej: 3">
    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>

      <select name="seller_id">
        <option value="" disabled selected>--Seleccione un vendedor--</option>
        <?php while ($seller = mysqli_fetch_assoc($sellers)) : ?>
          <option <?php echo $seller_id === $seller['id'] ? 'selected' : ''; ?> value="<?php echo $seller['id']; ?>">
            <?php echo $seller['firstname'] . " " . $seller['lastname']; ?>
          </option>
        <?php endwhile; ?>
      </select>
    </fieldset>

    <input type="submit" class="btnGreen" value="Editar propiedad">
  </form>
</main>

<?php includeTemplate('footer') ?>
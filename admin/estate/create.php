<?php
require '../../includes/config/database.php';
$db = dbConnection();

$getSellersQuery = "SELECT * FROM sellers";
$sellers = mysqli_query($db, $getSellersQuery);

$errors = [];

$title = '';
$price = '';
$description = '';
$bedrooms = '';
$bathrooms = '';
$park = '';
$created_at = date('Y/m/d');
$seller = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  $title = $_POST['title'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $bedrooms = $_POST['bedrooms'];
  $bathrooms = $_POST['bathrooms'];
  $park = $_POST['park'];
  $seller_id = $_POST['seller_id'];

  if (empty($title)) $errors[] = 'El título es obligatorio';
  if (empty($price)) $errors[] = 'El precio es obligatorio';
  if (strlen($description) < 50) $errors[] = 'La descripción debe tener al menos 50 caracteres';
  if (empty($bedrooms)) $errors[] = 'El número de habitaciones es obligatorio';
  if (empty($bathrooms)) $errors[] = 'El número de baños es obligatorio';
  if (empty($park)) $errors[] = 'El número de lugares de estacionamiento es obligatorio';
  if (empty($seller_id)) $errors[] = 'El vendedor es obligatorio';

  if (empty($errors)) {
    $createQuery = "INSERT INTO estates(
      title,
      price,
      description,
      bedrooms,
      bathrooms,
      park,
      created_at,
      seller_id
    ) VALUES (
      '$title',
      '$price',
      '$description',
      '$bedrooms',
      '$bathrooms',
      '$park',
      '$created_at',
      '$seller_id'
    );";

    $result = mysqli_query($db, $createQuery);

    if ($result) header('Location: /bienes-raices/admin');
  }
}

require '../../includes/functions.php';
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

  <form class="form" action="/bienes-raices/admin/estate/create.php" method="POST">
    <fieldset>
      <legend>Información general</legend>

      <label for="title">Título:</label>
      <input type="text" id="title" name="title" value="<?php echo $title; ?>" placeholder="Título de la propiedad">

      <label for="price">Precio:</label>
      <input type="number" id="price" name="price" value="<?php echo $price; ?>" placeholder="Precio de la propiedad">

      <label for="image">Imagen:</label>
      <input type="file" accept="image/jpeg, image/png" id="image">

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

    <input type="submit" class="btnGreen" value="Crear propiedad">
  </form>
</main>

<?php includeTemplate('footer') ?>
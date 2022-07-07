<?php
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) header("Location: /bienes-raices/src");

require '../includes/config/database.php';
$db = dbConnection();

$getEstateQuery = "SELECT * FROM estates WHERE id=${id}";
$result = mysqli_query($db, $getEstateQuery);

if (!$result->num_rows) header("Location: /bienes-raices/src");


$estate = mysqli_fetch_assoc($result);

require '../includes/functions.php';
includeTemplate('header');
?>

<main class="section container centerContent">
  <h1><?php echo $estate['title']; ?></h1>

  <img loading="lazy" src="/bienes-raices/images/<?php echo $estate['image']; ?>" alt="anuncio" />

  <div class="propertyResume">
    <p class="price"><?php echo $estate['price']; ?></p>

    <ul class="featureIcons">
      <li>
        <img loading="lazy" src="../build/img/icono_wc.svg" alt="Icono WC" />
        <p><?php echo $estate['bathrooms']; ?></p>
      </li>

      <li>
        <img loading="lazy" src="../build/img/icono_estacionamiento.svg" alt="Icono WC" />
        <p><?php echo $estate['bedrooms']; ?></p>
      </li>

      <li>
        <img loading="lazy" src="../build/img/icono_dormitorio.svg" alt="Icono WC" />
        <p><?php echo $estate['park']; ?></p>
      </li>
    </ul>

    <p><?php echo $estate['description']; ?></p>
  </div>
</main>

<?php
includeTemplate('footer');
mysqli_close($db);
?>
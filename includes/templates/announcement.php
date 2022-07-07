<?php
require __DIR__ . '/../config/database.php';
$db = dbConnection();

$getEstatesQuery = "SELECT * FROM estates LIMIT ${limit}";
$estates = mysqli_query($db, $getEstatesQuery);

?>

<div class="adsContainer">
  <?php while ($estate = mysqli_fetch_assoc($estates)) : ?>
    <div class="ad">

      <img loading="lazy" src="/bienes-raices/images/<?php echo $estate['image']; ?>" alt="anuncio" />

      <div class="content">
        <h3><?php echo $estate['title']; ?></h3>
        <p><?php echo $estate['description']; ?></p>
        <p class="price">$<?php echo number_format($estate['price']); ?></p>

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

        <a class="btnYellow-block" href="announcement.php?id=<?php echo $estate['id']; ?>">
          Ver propiedad
        </a>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<?php mysqli_close($db); ?>
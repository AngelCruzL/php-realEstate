<?php
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) header("Location: /bienes-raices/src");

require 'includes/app.php';

use App\Estate;

$estate = Estate::find($id);

includeTemplate('header');
?>

<main class="section container centerContent">
  <h1><?php echo $estate->title; ?></h1>

  <img loading="lazy" src="/bienes-raices/images/<?php echo $estate->image; ?>" alt="anuncio" />

  <div class="propertyResume">
    <p class="price"><?php echo $estate->price; ?></p>

    <ul class="featureIcons">
      <li>
        <img loading="lazy" src="build/img/icono_wc.svg" alt="Icono WC" />
        <p><?php echo $estate->bathrooms; ?></p>
      </li>

      <li>
        <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="Icono WC" />
        <p><?php echo $estate->bedrooms; ?></p>
      </li>

      <li>
        <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="Icono WC" />
        <p><?php echo $estate->park; ?></p>
      </li>
    </ul>

    <p><?php echo $estate->description; ?></p>
  </div>
</main>

<?php includeTemplate('footer'); ?>
<div class="adsContainer">
  <?php foreach ($estates as $estate) : ?>
    <div class="ad">

      <img loading="lazy" src="/images/<?php echo $estate->image; ?>" alt="anuncio" />

      <div class="content">
        <h3><?php echo $estate->title; ?></h3>
        <p><?php echo $estate->description; ?></p>
        <p class="price">$<?php echo number_format($estate->price); ?></p>

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

        <a class="btnYellow-block" href="/anuncio?id=<?php echo $estate->id; ?>">
          Ver propiedad
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>
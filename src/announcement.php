<?php
include '../includes/templates/header.php'
?>

<main class="section container centerContent">
  <h1>Casa en venta frente al bosque</h1>

  <picture>
    <source srcset="../build/img/destacada.webp" type="image/webp" />
    <source srcset="../build/img/destacada.jpg" type="image/jpeg" />
    <img loading="lazy" src="../build/img/destacada.jpg" alt="anuncio" />
  </picture>

  <div class="propertyResume">
    <p class="price">$3,000,000</p>

    <ul class="featureIcons">
      <li>
        <img loading="lazy" src="../build/img/icono_wc.svg" alt="Icono WC" />
        <p>3</p>
      </li>

      <li>
        <img loading="lazy" src="../build/img/icono_estacionamiento.svg" alt="Icono WC" />
        <p>3</p>
      </li>

      <li>
        <img loading="lazy" src="../build/img/icono_dormitorio.svg" alt="Icono WC" />
        <p>4</p>
      </li>
    </ul>

    <p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
      dolore? Corrupti esse minus eligendi cupiditate illo a, harum sequi
      quam voluptatem sunt rerum sapiente doloribus qui delectus
      consequuntur quod ad? Lorem ipsum, dolor sit amet consectetur
      adipisicing elit. Ea nam corporis quae asperiores? Deserunt
      dignissimos accusamus mollitia. Fugiat, voluptatem. Temporibus impedit
      earum beatae mollitia, facere corrupti saepe alias nobis reiciendis!
    </p>

    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti,
      alias a! Harum molestias aut consequatur quisquam laboriosam sunt
      tempora architecto quaerat provident asperiores quos et beatae,
      nostrum ipsa officiis animi!
    </p>
  </div>
</main>

<footer class="footer section">
  <div class="container footerContainer">
    <nav class="mainNavigation">
      <ul>
        <li><a href="about.php">Nosotros</a></li>
        <li><a href="announcements.php">Anuncios</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php">Contacto</a></li>
      </ul>
    </nav>
  </div>

  <p class="copyright">Todos los derechos reservados 2022 &copy;</p>
</footer>
</body>

</html>
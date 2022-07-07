<?php
require 'includes/app.php';
includeTemplate('header');
?>

<main class="container section">
  <h1>Conoce sobre nosotros</h1>
  <div class="aboutContent">
    <div class="image">
      <picture>
        <source srcset="build/img/nosotros.webp" type="img/webp" />
        <source srcset="build/img/nosotros.jpg" type="img/jpeg" />
        <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros" />
      </picture>
    </div>

    <div class="aboutText">
      <blockquote>25 años de experiencia</blockquote>

      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
        dolore? Corrupti esse minus eligendi cupiditate illo a, harum sequi
        quam voluptatem sunt rerum sapiente doloribus qui delectus
        consequuntur quod ad? Lorem ipsum, dolor sit amet consectetur
        adipisicing elit. Ea nam corporis quae asperiores? Deserunt
        dignissimos accusamus mollitia. Fugiat, voluptatem. Temporibus
        impedit earum beatae mollitia, facere corrupti saepe alias nobis
        reiciendis!
      </p>

      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti,
        alias a! Harum molestias aut consequatur quisquam laboriosam sunt
        tempora architecto quaerat provident asperiores quos et beatae,
        nostrum ipsa officiis animi!
      </p>
    </div>
  </div>
</main>

<section class="container section">
  <h2>Más sobre Nosotros</h2>

  <div class="aboutUs-icons">
    <div class="icon">
      <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy" />

      <h3>Seguridad</h3>

      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est
        architecto sit officia culpa sunt alias magni, esse, fugit
        voluptates, modi laudantium velit.
      </p>
    </div>

    <div class="icon">
      <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy" />

      <h3>Precio</h3>

      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est
        architecto sit officia culpa sunt alias magni, esse, fugit
        voluptates, modi laudantium velit.
      </p>
    </div>
    <div class="icon">
      <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy" />

      <h3>A tiempo</h3>

      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est
        architecto sit officia culpa sunt alias magni, esse, fugit
        voluptates, modi laudantium velit.
      </p>
    </div>
  </div>
</section>

<?php
includeTemplate('footer');
?>
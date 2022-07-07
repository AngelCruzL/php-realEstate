<?php

declare(strict_types=1);
require '../includes/functions.php';
includeTemplate('header', true);
?>

<main class="container section">
  <h2>Más sobre Nosotros</h2>

  <div class="aboutUs-icons">
    <div class="icon">
      <img src="../build/img/icono1.svg" alt="Icono seguridad" loading="lazy" />

      <h3>Seguridad</h3>

      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est
        architecto sit officia culpa sunt alias magni, esse, fugit
        voluptates, modi laudantium velit.
      </p>
    </div>

    <div class="icon">
      <img src="../build/img/icono2.svg" alt="Icono precio" loading="lazy" />

      <h3>Precio</h3>

      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est
        architecto sit officia culpa sunt alias magni, esse, fugit
        voluptates, modi laudantium velit.
      </p>
    </div>
    <div class="icon">
      <img src="../build/img/icono3.svg" alt="Icono tiempo" loading="lazy" />

      <h3>A tiempo</h3>

      <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est
        architecto sit officia culpa sunt alias magni, esse, fugit
        voluptates, modi laudantium velit.
      </p>
    </div>
  </div>
</main>

<section class="section container">
  <h2>Casas y Departamentos en Venta</h2>

  <?php
  $limit = 3;
  include '../includes/templates/announcement.php';
  ?>

  <div class="alignEnd">
    <a class="btnGreen" href="announcements.php">Ver todas</a>
  </div>
</section>

<section class="contactImage">
  <h2>Encuentra la casa de tus sueños</h2>
  <p class="container">
    Llena el formulario de contacto y un asesor se pondrá en contacto
    contigo a la brevedad
  </p>
  <a href="contact.php" class="btnYellow">Contáctenos</a>
</section>

<div class="container section sectionBlog">
  <section class="blog">
    <h3>Nuestro Blog</h3>

    <article class="blogPost">
      <div class="image">
        <picture>
          <source srcset="../build/img/blog1.webp" type="image/webp" />
          <source srcset="../build/img/blog1.jpg" type="image/jpeg" />
          <img loading="lazy" src="../build/img/blog1.jpg" alt="blog" />
        </picture>
      </div>

      <div class="postText">
        <a href="post.php">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="metadata">
            Escrito el: <span>15/07/2022</span> por: <span>Admin</span>
          </p>

          <p>
            Consejos para construir una terraza en el techo de tu casa con
            los mejores materiales y ahorrando tu dinero.
          </p>
        </a>
      </div>
    </article>

    <article class="blogPost">
      <div class="image">
        <picture>
          <source srcset="../build/img/blog2.webp" type="image/webp" />
          <source srcset="../build/img/blog2.jpg" type="image/jpeg" />
          <img loading="lazy" src="../build/img/blog2.jpg" alt="blog" />
        </picture>
      </div>

      <div class="postText">
        <a href="post.php">
          <h4>Guía para la decoración de tu hogar</h4>
          <p class="metadata">
            Escrito el: <span>15/07/2022</span> por: <span>Admin</span>
          </p>

          <p>
            Maximiza el espacio en tu hogar con esta guía, aprende a
            combinar muebles y colores para darle vida a tu espacio.
          </p>
        </a>
      </div>
    </article>
  </section>

  <section class="testimonials">
    <h3>Testimoniales</h3>

    <div class="testimonial">
      <blockquote>
        El personal se comporto de una excelente forma, muy buena atención y
        la casa que me ofrecieron cumple con todas mis expectativas.
      </blockquote>

      <p class="author">Ángel Cruz</p>
    </div>
  </section>
</div>

<?php
includeTemplate('footer');
?>
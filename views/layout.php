<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienes Raíces</title>
  <link rel="stylesheet" href="../build/css/app.css" />
  <script src="../build/js/bundle.min.js" defer></script>
</head>

<body>
  <header class="header <?php echo $isIndex ? 'mainHeader' : '' ?>">
    <div class="container headerContent">
      <div class="navbar <?php echo $isIndex ? 'home' : '' ?>">
        <a href="index.php">
          <img src="../build/img/logo.svg" alt="Bienes Raíces logo" />
        </a>

        <div class="mobileMenu">
          <img src="../build/img/barras.svg" alt="Icono de menu responsivo" />
        </div>

        <div class="navigationContainer">
          <img src="../build/img/dark-mode.svg" alt="" class="darkMode-btn" />

          <nav class="mainNavigation <?php echo $isIndex ? 'home' : '' ?>">
            <ul>
              <li><a href="about.php">Nosotros</a></li>
              <li><a href="announcements.php">Anuncios</a></li>
              <li><a href="blog.php">Blog</a></li>
              <li><a href="contact.php">Contacto</a></li>
              <?php if ($isAuth) : ?>
                <li><a href="logout.php">Cerrar Sesión</a></li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
      </div>

      <?php
      echo $isIndex
        ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>'
        : ''
      ?>
    </div>
  </header>

  <?php echo $content; ?>

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

    <p class="copyright">Todos los derechos reservados <?php echo date('Y') ?> &copy;</p>
  </footer>
</body>

</html>
<?php
if (!isset($_SESSION)) session_start();

$isAuth = $_SESSION['logged'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienes Raíces</title>
  <link rel="stylesheet" href="/bienes-raices/build/css/app.css" />
  <script src="/bienes-raices/build/js/bundle.min.js" defer></script>
</head>

<body>
  <header class="header <?php echo $isIndex ? 'mainHeader' : '' ?>">
    <div class="container headerContent">
      <div class="navbar <?php echo $isIndex ? 'home' : '' ?>">
        <a href="/bienes-raices/index.php">
          <img src="/bienes-raices/build/img/logo.svg" alt="Bienes Raíces logo" />
        </a>

        <div class="mobileMenu">
          <img src="/bienes-raices/build/img/barras.svg" alt="Icono de menu responsivo" />
        </div>

        <div class="navigationContainer">
          <img src="/bienes-raices/build/img/dark-mode.svg" alt="" class="darkMode-btn" />

          <nav class="mainNavigation <?php echo $isIndex ? 'home' : '' ?>">
            <ul>
              <li><a href="/bienes-raices/about.php">Nosotros</a></li>
              <li><a href="/bienes-raices/announcements.php">Anuncios</a></li>
              <li><a href="/bienes-raices/blog.php">Blog</a></li>
              <li><a href="/bienes-raices/contact.php">Contacto</a></li>
              <?php if ($isAuth) : ?>
                <li><a href="/bienes-raices/logout.php">Cerrar Sesión</a></li>
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
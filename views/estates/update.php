<main class="container section">
  <h1>Actualizar Propiedad</h1>

  <a href="/admin" class="btnGreen">Volver</a>

  <?php foreach ($errors as $error) : ?>
    <div class="alert alertError">
      <p><?php echo $error; ?></p>
    </div>
  <?php endforeach; ?>

  <form class="form" method="POST" enctype="multipart/form-data">
    <?php include __DIR__ . '/form.php' ?>

    <input type="submit" class="btnGreen" value="Crear propiedad">
  </form>
</main>
<main class="container section">
  <h1>Crear</h1>

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
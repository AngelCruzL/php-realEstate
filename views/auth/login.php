<main class="container section centerContent">
  <h1 data-cy="loginHeading">Iniciar Sesión</h1>

  <?php foreach ($errors as $error) : ?>
    <div data-cy="loginErrorAlert" class="alert alertError">
      <p><?php echo $error; ?></p>
    </div>
  <?php endforeach; ?>

  <form data-cy="loginForm" class="form" method="POST">
    <fieldset>
      <legend>Correo y contraseña</legend>

      <label for="email">Correo electrónico</label>
      <input data-cy="inputEmail" type="email" name="email" id="email" placeholder="email@email.com" />

      <label for="password">Contraseña</label>
      <input data-cy="inputPassword" type="password" name="password" id="password" placeholder="Tu contraseña" />
    </fieldset>

    <input type="submit" value="Iniciar Sesión" class="btnGreen" aria-label="Iniciar Sesión" />
  </form>
</main>
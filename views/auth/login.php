<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (empty($errors)) {
    $query = "SELECT * FROM users WHERE email = '${email}';";
    $result = mysqli_query($db, $query);

    if ($result->num_rows) {
      $user = mysqli_fetch_assoc($result);
      $auth = password_verify($password, $user['password']);

      if ($auth) {
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['logged'] = true;
        header('Location: /bienes-raices/admin');
      } else {
        $errors[] = 'La contraseña es incorrecta';
      }
    } else {
      $errors[] = 'El usuario no existe';
    }
  }
}
?>

<main class="section container centerContent">
  <h1>Iniciar Sesión</h1>

  <?php foreach ($errors as $error) : ?>
    <div class="alert alertError">
      <p><?php echo $error; ?></p>
    </div>
  <?php endforeach; ?>

  <form class="form" method="POST">
    <fieldset>
      <legend>Correo y contraseña</legend>

      <label for="email">Correo electrónico</label>
      <input type="email" name="email" id="email" placeholder="email@email.com" />

      <label for="password">Contraseña</label>
      <input type="password" name="password" id="password" placeholder="Tu contraseña" />
    </fieldset>

    <input type="submit" value="Iniciar Sesión" class="btnGreen" aria-label="Iniciar Sesión" />
  </form>
</main>
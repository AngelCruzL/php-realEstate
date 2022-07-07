<?php

declare(strict_types=1);
require '../../includes/functions.php';
includeTemplate('header');
?>

<main class="container section">
  <h1>Crear</h1>

  <a href="/bienes-raices/admin" class="btnGreen">Volver</a>

  <form class="form">
    <fieldset>
      <legend>Información general</legend>

      <label for="title">Título:</label>
      <input type="text" id="title" name="title" placeholder="Título de la propiedad">

      <label for="price">Precio:</label>
      <input type="number" id="price" name="price" placeholder="Precio de la propiedad">

      <label for="image">Imagen:</label>
      <input type="file" accept="image/jpeg, image/png" id="image" name="image">

      <label for="description">Descripción:</label>
      <textarea name="description" id="description"></textarea>
    </fieldset>

    <fieldset>
      <legend>Información de la Propiedad</legend>

      <label for="rooms">Habitaciones:</label>
      <input type="number" id="rooms" name="rooms" placeholder="Ej: 3">

      <label for="bathrooms">Baños:</label>
      <input type="number" id="bathrooms" name="bathrooms" placeholder="Ej: 3">

      <label for="park">Estacionamiento:</label>
      <input type="number" id="park" name="park" placeholder="Ej: 3">
    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>

      <select name="seller" id="seller">
        <option value="">Seleccione un vendedor</option>
        <option value="1">Luis</option>
        <option value="2">Ángel</option>
      </select>
    </fieldset>

    <input type="submit" class="btnGreen" value="Crear propiedad">
  </form>
</main>

<?php includeTemplate('footer') ?>
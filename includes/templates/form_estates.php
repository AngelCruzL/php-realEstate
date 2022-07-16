<fieldset>
  <legend>Información general</legend>

  <label for="title">Título:</label>
  <input type="text" id="title" name="estate[title]" value="<?php echo s($estate->title); ?>" placeholder="Título de la propiedad">

  <label for="price">Precio:</label>
  <input type="number" id="price" name="estate[price]" value="<?php echo s($estate->price); ?>" placeholder="Precio de la propiedad">

  <label for="image">Imagen:</label>
  <input type="file" accept="image/jpeg, image/png" id="image" name="estate[image]">

  <?php if ($estate->image) : ?>
    <img class="imageSmall" src="../../images/<?php echo $estate->image; ?>">
  <?php endif; ?>

  <label for="description">Descripción:</label>
  <textarea name="estate[description]" id="description"><?php echo s($estate->description); ?></textarea>
</fieldset>

<fieldset>
  <legend>Información de la Propiedad</legend>

  <label for="bedrooms">Habitaciones:</label>
  <input type="number" id="bedrooms" name="estate[bedrooms]" min="1" max="9" value="<?php echo s($estate->bedrooms); ?>" placeholder="Ej: 3">

  <label for="bathrooms">Baños:</label>
  <input type="number" id="bathrooms" name="estate[bathrooms]" min="1" max="9" value="<?php echo s($estate->bathrooms); ?>" placeholder="Ej: 3">

  <label for="park">Estacionamiento:</label>
  <input type="number" id="park" name="estate[park]" min="1" max="9" value="<?php echo s($estate->park); ?>" placeholder="Ej: 3">
</fieldset>

<fieldset>
  <legend>Vendedor</legend>

  <label for="seller">Vendedor</label>
  <select name="estate[seller_id]" id="seller">
    <option value="" disabled selected>--Seleccione un vendedor--</option>
    <?php foreach ($sellers as $seller) : ?>
      <option <?php echo $estate->seller_id === $seller->id ? 'selected' : ''; ?> value="<?php echo s($seller->id); ?>">
        <?php echo s($seller->firstname) . " " . s($seller->lastname); ?>
      </option>
    <?php endforeach; ?>
  </select>
</fieldset>
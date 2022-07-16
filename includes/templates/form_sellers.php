<fieldset>
  <legend>Información general</legend>

  <label for="firstname">Nombre:</label>
  <input type="text" id="firstname" name="seller[firstname]" value="<?php echo s($seller->firstname); ?>" placeholder="Nombre Vendedor(a)">

  <label for="lastname">Apellido:</label>
  <input type="text" id="lastname" name="seller[lastname]" value="<?php echo s($seller->lastname); ?>" placeholder="Apellido Vendedor(a)">
</fieldset>

<fieldset>
  <legend>Información Extra</legend>

  <label for="phone">Teléfono:</label>
  <input type="text" id="phone" name="seller[phone]" value="<?php echo s($seller->phone); ?>" placeholder="Teléfono Vendedor(a)">
</fieldset>
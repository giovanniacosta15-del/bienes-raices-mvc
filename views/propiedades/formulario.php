<fieldset>
    <legend>Información general</legend>

    <label for="titulo">Título</label>
    <input
        type="text"
        id="titulo"
        name="propiedad[titulo]"
        placeholder="Título de la propiedad"
        value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input
        type="number"
        id="precio"
        name="propiedad[precio]"
        placeholder="Precio de la propiedad"
        value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input
        type="file"
        id="imagen"
        accept="image/jpeg, image/png"
        name="propiedad[imagen]">

    <?php if($propiedad->imagen) { ?>
        <div class="imagen-actual">
            <p>Imagen actual</p>
            <img src="/imagenes/<?php echo s($propiedad->imagen); ?>" class="imagen-small" alt="Imagen actual de la propiedad">
        </div>
    <?php } ?>

    <label for="descripcion">Descripción</label>
    <textarea id="descripcion" name="propiedad[descripcion]" placeholder="Describe ubicación, espacios y beneficios principales"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Características</legend>

    <label for="habitaciones">Habitaciones</label>
    <input
        type="number"
        id="habitaciones"
        name="propiedad[habitaciones]"
        placeholder="Ej: 3"
        min="1"
        max="9"
        value="<?php echo s($propiedad->habitaciones); ?>">

    <label for="wc">Baños</label>
    <input
        type="number"
        id="wc"
        name="propiedad[wc]"
        placeholder="Ej: 2"
        min="1"
        max="9"
        value="<?php echo s($propiedad->wc); ?>">

    <label for="estacionamiento">Estacionamientos</label>
    <input
        type="number"
        id="estacionamiento"
        name="propiedad[estacionamiento]"
        placeholder="Ej: 2"
        min="1"
        max="9"
        value="<?php echo s($propiedad->estacionamiento); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <label for="vendedor">Vendedor asignado</label>
    <select name="propiedad[vendedores_id]" id="vendedor">
        <option selected value="">-- Seleccione --</option>
        <?php foreach($vendedores as $vendedor) { ?>
            <option
                <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?>
                value="<?php echo s($vendedor->id); ?>">
                <?php echo s($vendedor->nombre) . ' ' . s($vendedor->apellido); ?>
            </option>
        <?php } ?>
    </select>
</fieldset>

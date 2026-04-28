<main class="contenedor seccion formulario-admin">
    <div class="encabezado-seccion encabezado-seccion--izquierda">
        <p class="eyebrow">Editar vendedor</p>
        <h1>Actualizar vendedor</h1>
        <p>Mantén actualizada la informacion de contacto del asesor.</p>
    </div>

    <a href="/admin" class="boton-verde">Volver al panel</a>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo s($error); ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario formulario-admin__card" method="POST">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Guardar cambios" class="boton-verde">
    </form>
</main>

<main class="contenedor seccion formulario-admin">
    <div class="encabezado-seccion encabezado-seccion--izquierda">
        <p class="eyebrow">Editar propiedad</p>
        <h1>Actualizar propiedad</h1>
        <p>Ajusta la informacion del anuncio y guarda los cambios.</p>
    </div>

    <a href="/admin" class="boton-verde">Volver al panel</a>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo s($error); ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario formulario-admin__card" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Actualizar propiedad" class="boton-verde">
    </form>
</main>

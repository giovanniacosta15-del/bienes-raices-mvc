<main class="contenedor seccion formulario-admin">
    <div class="encabezado-seccion encabezado-seccion--izquierda">
        <p class="eyebrow">Nuevo vendedor</p>
        <h1>Registrar vendedor</h1>
        <p>Agrega los datos del asesor que administrara propiedades.</p>
    </div>

    <a href="/admin" class="boton-verde">Volver al panel</a>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo s($error); ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario formulario-admin__card" method="POST" action="/vendedores/crear">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Registrar vendedor" class="boton-verde">
    </form>
</main>

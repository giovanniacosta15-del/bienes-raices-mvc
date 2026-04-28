<main class="contenedor seccion contenido-centrado login-admin">
    <div class="encabezado-seccion">
        <p class="eyebrow">Acceso privado</p>
        <h1>Iniciar sesi&oacute;n</h1>
        <p>Ingresa con tus credenciales para administrar propiedades y vendedores.</p>
    </div>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo s($error); ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario formulario-contacto" action="/login">
        <fieldset>
            <legend>Acceso administrativo</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu email" id="email" required>

            <label for="password">Password</label>
            <div class="campo-password">
                <input type="password" name="password" placeholder="Tu password" id="password" required>
                <button class="toggle-password" type="button" aria-label="Mostrar password" aria-pressed="false">
                    <svg class="icono-ver" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M2.1 12s3.7-6.5 9.9-6.5S21.9 12 21.9 12 18.2 18.5 12 18.5 2.1 12 2.1 12Z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                    <svg class="icono-ocultar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M3 3l18 18"/>
                        <path d="M10.6 5.7c.5-.1.9-.2 1.4-.2 6.2 0 9.9 6.5 9.9 6.5a18.4 18.4 0 0 1-3.1 3.8"/>
                        <path d="M6.6 6.8A18.5 18.5 0 0 0 2.1 12s3.7 6.5 9.9 6.5c1.6 0 3-.4 4.2-1"/>
                        <path d="M9.9 9.9a3 3 0 0 0 4.2 4.2"/>
                    </svg>
                </button>
            </div>
        </fieldset>

        <input type="submit" value="Iniciar sesi&oacute;n" class="boton-verde">
    </form>
</main>

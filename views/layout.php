<?php
    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)) {
        $inicio = false;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bienes Raices - venta de casas y departamentos.">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/" class="logo" aria-label="Ir al inicio">
                    <img src="/build/img/logo.png" alt="Logotipo de Bienes Raices">
                </a>

                <button class="mobile-menu" type="button" aria-label="Abrir menu" aria-expanded="false">
                    <img src="/build/img/barras.png" alt="">
                </button>

                <div class="derecha">
                    <button class="dark-mode-toggle" type="button" aria-label="Cambiar modo oscuro">
                        <img class="dark-mode-boton" src="/build/img/dark-mode.png" alt="">
                    </button>

                    <nav class="navegacion navegacion-principal" aria-label="Navegacion principal">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/admin">Admin</a>
                            <a href="/logout">Cerrar sesion</a>
                        <?php else: ?>
                            <a href="/login">Ingresar</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>

            <?php if($inicio) { ?>
                <h1>Venta de casas y departamentos exclusivos de lujo</h1>
            <?php } ?>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion" aria-label="Navegacion de pie de pagina">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
                <?php if($auth): ?>
                    <a href="/admin">Admin</a>
                    <a href="/logout">Cerrar sesion</a>
                <?php else: ?>
                    <a href="/login">Ingresar</a>
                <?php endif; ?>
            </nav>

            <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
        </div>
    </footer>

    <script src="/build/js/bundle.min.js"></script>
</body>
</html>

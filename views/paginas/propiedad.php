<?php
    /** @var \Model\Propiedad $propiedad */
    $titulo = s($propiedad->titulo);
    $imagen = s($propiedad->imagen);
    $descripcion = nl2br(s($propiedad->descripcion));
    $precio = is_numeric($propiedad->precio)
        ? number_format((float) $propiedad->precio, 0, '.', ',')
        : s($propiedad->precio);
    $wc = s($propiedad->wc);
    $estacionamiento = s($propiedad->estacionamiento);
    $habitaciones = s($propiedad->habitaciones);
?>

<main class="contenedor seccion contenido-centrado detalle-propiedad">
    <p class="detalle-propiedad__etiqueta">Propiedad destacada</p>
    <h1><?php echo $titulo; ?></h1>

    <div class="detalle-propiedad__imagen">
        <img loading="lazy" src="/imagenes/<?php echo $imagen; ?>" alt="Imagen de <?php echo $titulo; ?>">
    </div>

    <section class="resumen-propiedad" aria-label="Resumen de la propiedad">
        <div class="resumen-propiedad__encabezado">
            <p class="resumen-propiedad__subtitulo">Precio de venta</p>
            <p class="precio">$<?php echo $precio; ?></p>
        </div>

        <ul class="iconos-caracteristicas">
            <li class="caracteristica caracteristica--wc">
                <img class="icono" src="/build/img/icono_wc.png" alt="Icono sanitarios">
                <div>
                    <span><?php echo $wc; ?></span>
                    <p>Sanitarios</p>
                </div>
            </li>

            <li class="caracteristica caracteristica--parking">
                <img class="icono" src="/build/img/icono_estacionamiento.png" alt="Icono estacionamientos">
                <div>
                    <span><?php echo $estacionamiento; ?></span>
                    <p>Estacionamientos</p>
                </div>
            </li>

            <li class="caracteristica caracteristica--habitaciones">
                <img class="icono" src="/build/img/icono_dormitorio.png" alt="Icono dormitorios">
                <div>
                    <span><?php echo $habitaciones; ?></span>
                    <p>Dormitorios</p>
                </div>
            </li>
        </ul>

        <div class="resumen-propiedad__descripcion">
            <h2>Descripci&oacute;n</h2>
            <p><?php echo $descripcion; ?></p>
        </div>
    </section>
</main>

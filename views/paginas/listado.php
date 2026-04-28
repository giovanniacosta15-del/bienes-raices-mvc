<?php
    $propiedades = $propiedades ?? [];
?>

<?php if(empty($propiedades)) { ?>
    <p class="alerta">No hay propiedades disponibles por el momento.</p>
<?php } else { ?>
    <div class="contenedor-anuncios">
        <?php foreach($propiedades as $propiedad) {
            $id = s($propiedad->id ?? '');
            $titulo = s($propiedad->titulo ?? 'Propiedad sin titulo');
            $imagen = s($propiedad->imagen ?? '');
            $descripcion = s($propiedad->descripcion ?? '');
            $precioBase = $propiedad->precio ?? '';
            $precio = is_numeric($precioBase)
                ? number_format((float) $precioBase, 0, '.', ',')
                : s($precioBase);
            $wc = s($propiedad->wc ?? '0');
            $estacionamiento = s($propiedad->estacionamiento ?? '0');
            $habitaciones = s($propiedad->habitaciones ?? '0');
        ?>

            <article class="anuncio">
                <img loading="lazy" src="/imagenes/<?php echo $imagen; ?>" alt="Imagen de <?php echo $titulo; ?>">

                <div class="contenido-anuncio">
                    <h3><?php echo $titulo; ?></h3>
                    <p><?php echo $descripcion; ?></p>
                    <p class="precio">$<?php echo $precio; ?></p>

                    <ul class="iconos-caracteristicas">
                        <li class="caracteristica caracteristica--wc">
                            <img src="/build/img/icono_wc.png" alt="Icono baños">
                            <span><?php echo $wc; ?></span>
                        </li>

                        <li class="caracteristica caracteristica--parking">
                            <img src="/build/img/icono_estacionamiento.png" alt="Icono estacionamiento">
                            <span><?php echo $estacionamiento; ?></span>
                        </li>

                        <li class="caracteristica caracteristica--habitaciones">
                            <img src="/build/img/icono_dormitorio.png" alt="Icono habitaciones">
                            <span><?php echo $habitaciones; ?></span>
                        </li>
                    </ul>

                    <a href="/propiedad?id=<?php echo $id; ?>" class="boton-amarillo-block">
                        Ver propiedad
                    </a>
                </div>
            </article>
        <?php } ?>
    </div>
<?php } ?>

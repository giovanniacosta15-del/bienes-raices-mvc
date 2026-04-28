<main class="contenedor seccion admin-panel">
    <div class="encabezado-seccion encabezado-seccion--izquierda">
        <p class="eyebrow">Panel privado</p>
        <h1>Administrador de Bienes Raices</h1>
        <p>Gestiona propiedades, imagenes y vendedores desde un solo lugar.</p>
    </div>

    <?php
        if($resultado) {
            $mensaje = mostrarNotificaciones(intval($resultado));
            if($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje); ?></p>
            <?php }
        }
    ?>

    <div class="admin-acciones">
        <a href="/propiedades/crear" class="boton-verde">Nueva propiedad</a>
        <a href="/vendedores/crear" class="boton-amarillo">Nuevo vendedor</a>
    </div>

    <section class="admin-seccion">
        <div class="admin-seccion__titulo">
            <h2>Propiedades</h2>
            <p><?php echo count($propiedades); ?> registros</p>
        </div>

        <div class="tabla-scroll">
            <table class="propiedades">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($propiedades as $propiedad):
                        $id = s($propiedad->id);
                        $titulo = s($propiedad->titulo);
                        $imagen = s($propiedad->imagen);
                        $precio = is_numeric($propiedad->precio)
                            ? number_format((float) $propiedad->precio, 0, '.', ',')
                            : s($propiedad->precio);
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $titulo; ?></td>
                            <td>
                                <img src="/imagenes/<?php echo $imagen; ?>" class="imagen-tabla" alt="Imagen de <?php echo $titulo; ?>">
                            </td>
                            <td>$ <?php echo $precio; ?></td>
                            <td>
                                <div class="acciones-tabla">
                                    <a href="/propiedades/actualizar?id=<?php echo $id; ?>" class="boton-amarillo-block">Actualizar</a>

                                    <form method="POST" class="w-100" action="/propiedades/eliminar">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="tipo" value="propiedad">
                                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

    <section class="admin-seccion">
        <div class="admin-seccion__titulo">
            <h2>Vendedores</h2>
            <p><?php echo count($vendedores); ?> registros</p>
        </div>

        <div class="tabla-scroll">
            <table class="propiedades">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($vendedores as $vendedor):
                        $id = s($vendedor->id);
                        $nombre = s($vendedor->nombre . ' ' . $vendedor->apellido);
                        $telefono = s($vendedor->telefono);
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $telefono; ?></td>
                            <td>
                                <div class="acciones-tabla">
                                    <a href="/vendedores/actualizar?id=<?php echo $id; ?>" class="boton-amarillo-block">Actualizar</a>

                                    <form method="POST" class="w-100" action="/vendedores/eliminar">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="tipo" value="vendedor">
                                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

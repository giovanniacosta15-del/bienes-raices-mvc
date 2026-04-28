<main class="contenedor seccion pagina-contacto">
    <div class="encabezado-seccion">
        <p class="eyebrow">Hablemos</p>
        <h1>Contacto</h1>
        <p>Cu&eacute;ntanos qu&eacute; necesitas y un asesor te responder&aacute; con una propuesta clara.</p>
    </div>

    <?php if($mensaje) { ?>
        <p class="alerta <?php echo ($tipoMensaje ?? '') === 'error' ? 'error' : 'exito'; ?>">
            <?php echo s($mensaje); ?>
        </p>
    <?php } ?>

    <div class="contacto-layout">
        <div class="contacto-layout__imagen">
            <picture>
                <source srcset="build/img/webp/destacada3.webp" type="image/webp">
                <source srcset="build/img/destacada3.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/destacada3.jpg" alt="Casa moderna con amplio jardin">
            </picture>
        </div>

        <form class="formulario formulario-contacto" action="/contacto" method="POST">
            <fieldset>
                <legend>Informaci&oacute;n personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="contacto[mensaje]" placeholder="Cu&eacute;ntanos qu&eacute; tipo de propiedad buscas o quieres vender" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Informaci&oacute;n sobre la propiedad</legend>

                <label for="opciones">Operaci&oacute;n</label>
                <select id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" min="0" required>
            </fieldset>

            <fieldset>
                <legend>Preferencia de contacto</legend>

                <p>C&oacute;mo deseas ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Tel&eacute;fono</label>
                    <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>

                    <label for="contactar-email">E-mail</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                </div>

                <div id="contacto"></div>
            </fieldset>

            <input type="submit" value="Enviar mensaje" class="boton-verde">
        </form>
    </div>
</main>

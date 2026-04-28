<main class="contenedor seccion pagina-contacto">
    <div class="encabezado-seccion">
        <p class="eyebrow">Hablemos</p>
        <h1>Contacto</h1>
        <p>Cuéntanos qué necesitas y un asesor te responderá con una propuesta clara.</p>
    </div>

    <?php if($mensaje) { ?>
        <p class="alerta exito"><?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?></p>
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
                <legend>Informacion personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="contacto[mensaje]" placeholder="Cuéntanos que tipo de propiedad buscas o quieres vender" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>

                <label for="opciones">Operacion</label>
                <select id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" required>
            </fieldset>

            <fieldset>
                <legend>Preferencia de contacto</legend>

                <p>Como deseas ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
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

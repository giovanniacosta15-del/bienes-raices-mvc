<main class="contenedor seccion pagina-inicio">
    <div class="encabezado-seccion">
        <p class="eyebrow">Bienes Raices</p>
        <h1>Encuentra un lugar que se sienta como hogar</h1>
        <p>Te acompañamos con asesoría clara, propiedades verificadas y una experiencia pensada para comprar o vender con confianza.</p>
    </div>

    <?php include 'iconos.php'; ?>
</main>

<section class="seccion contenedor">
    <div class="encabezado-seccion encabezado-seccion--izquierda">
        <p class="eyebrow">Disponibles ahora</p>
        <h2>Casas y departamentos en venta</h2>
    </div>

    <?php include 'listado.php'; ?>

    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde">Ver todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <div class="imagen-contacto__contenido contenedor">
        <p class="eyebrow">Asesoria personalizada</p>
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Completa el formulario y un asesor se pondrá en contacto contigo a la brevedad.</p>
        <a href="/contacto" class="boton-amarillo">Contactanos</a>
    </div>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog blog--resumen">
        <div class="encabezado-seccion encabezado-seccion--izquierda">
            <p class="eyebrow">Ideas y consejos</p>
            <h3>Nuestro blog</h3>
        </div>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/webp/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Terraza moderna en el techo de una casa">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>03/11/2025</span> por: <span>Admin</span></p>
                    <p>Consejos para construir una terraza con buenos materiales, mejor distribución y un presupuesto inteligente.</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/webp/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Sala decorada con estilo moderno">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>04/11/2025</span> por: <span>Admin</span></p>
                    <p>Aprende a combinar muebles, iluminación y colores para aprovechar mejor cada espacio.</p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <div class="encabezado-seccion encabezado-seccion--izquierda">
            <p class="eyebrow">Clientes felices</p>
            <h3>Testimoniales</h3>
        </div>

        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, con muy buena atención. La casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>

            <p>- Mathias Acosta</p>
        </div>
    </section>
</div>

<?php
    $entradas = [
        [
            'titulo' => 'Terraza en el techo de tu casa',
            'fecha' => '03/11/2025',
            'imagen' => 'blog1',
            'alt' => 'Terraza moderna en el techo de una casa',
            'descripcion' => 'Consejos para construir una terraza con buenos materiales, mejor distribucion y un presupuesto inteligente.'
        ],
        [
            'titulo' => 'Guía para la decoración de tu hogar',
            'fecha' => '04/11/2025',
            'imagen' => 'blog2',
            'alt' => 'Sala decorada con estilo moderno',
            'descripcion' => 'Maximiza el espacio en tu hogar con ideas simples para combinar muebles, iluminación y colores.'
        ],
        [
            'titulo' => 'Ideas de jardines pequeños para tu hogar',
            'fecha' => '03/11/2025',
            'imagen' => 'blog3',
            'alt' => 'Jardin pequeño con plantas decorativas',
            'descripcion' => 'Crea un jardin funcional incluso en espacios reducidos, con plantas de bajo mantenimiento y diseños modernos.'
        ],
        [
            'titulo' => 'Renovacion economica de tu baño',
            'fecha' => '04/11/2025',
            'imagen' => 'blog4',
            'alt' => 'Baño renovado con acabados modernos',
            'descripcion' => 'Trucos de iluminación, pintura y accesorios para renovar tu baño sin gastar demasiado.'
        ],
    ];
?>

<main class="contenedor seccion blog-listado">
    <div class="encabezado-seccion">
        <p class="eyebrow">Inspiración inmobiliaria</p>
        <h1>Nuestro blog</h1>
        <p>Ideas prácticas para cuidar, renovar y disfrutar mejor tus espacios.</p>
    </div>

    <div class="blog-listado__grid">
        <?php foreach($entradas as $entrada) { ?>
            <article class="entrada-blog entrada-blog--tarjeta">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/webp/<?php echo $entrada['imagen']; ?>.webp" type="image/webp">
                        <source srcset="build/img/<?php echo $entrada['imagen']; ?>.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/<?php echo $entrada['imagen']; ?>.jpg" alt="<?php echo $entrada['alt']; ?>">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <p class="informacion-meta">Escrito el: <span><?php echo $entrada['fecha']; ?></span> por: <span>Admin</span></p>
                        <h2><?php echo $entrada['titulo']; ?></h2>
                        <p><?php echo $entrada['descripcion']; ?></p>
                    </a>
                </div>
            </article>
        <?php } ?>
    </div>
</main>

document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
    darkMode();
    togglePassword();
});

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-toggle');

    if(botonDarkMode) {
        botonDarkMode.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
        });
    }
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    if(mobileMenu) {
        mobileMenu.addEventListener('click', navegacionResponsive);
    }

    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));
}

function navegacionResponsive(e) {
    const navegacion = document.querySelector('.navegacion-principal');

    if(navegacion) {
        navegacion.classList.toggle('mostrar');
        e.currentTarget.setAttribute('aria-expanded', String(navegacion.classList.contains('mostrar')));
    }
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');

    if(!contactoDiv) {
        return;
    }

    if(e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">N&uacute;mero de tel&eacute;fono</label>
            <input type="tel" placeholder="Tu tel&eacute;fono" id="telefono" name="contacto[telefono]" required>

            <p>Elija la fecha y la hora para la llamada</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]" required>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="08:00" max="18:00" name="contacto[hora]" required>
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu email" id="email" name="contacto[email]" required>
        `;
    }
}

function togglePassword() {
    const boton = document.querySelector('.toggle-password');
    const password = document.querySelector('#password');

    if(!boton || !password) {
        return;
    }

    boton.addEventListener('click', function() {
        const esVisible = password.type === 'text';

        password.type = esVisible ? 'password' : 'text';
        boton.classList.toggle('is-visible', !esVisible);
        boton.setAttribute('aria-pressed', String(!esVisible));
        boton.setAttribute('aria-label', esVisible ? 'Mostrar password' : 'Ocultar password');
    });
}

/**
 * nav.js
 * -----------------------------------------------------------
 * Controla el menú responsive y el estado activo visual
 * de las opciones del menú principal.
 *
 * Funciones:
 * 1. Abrir/cerrar el menú mobile.
 * 2. Cerrar el menú al hacer click en un enlace.
 * 3. Cerrar el menú si se hace click fuera del nav.
 * 4. Cerrar el menú al volver a tamaño desktop.
 * 5. Marcar una sola opción activa a la vez.
 * 6. Mover el estado activo según la sección visible.
 * 7. Forzar la activación de la última sección al llegar
 *    al final de la página.
 * -----------------------------------------------------------
 */

document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu');
    const navLinks = document.querySelectorAll('.menu .nav-link');
    const sections = document.querySelectorAll('main section[id]');

    // Si faltan elementos base, se detiene la ejecución.
    if (!menuToggle || !menu || navLinks.length === 0 || sections.length === 0) {
        return;
    }

    /**
     * Cambia el estado del menú hamburguesa en mobile.
     */
    const setMenuState = (isOpen) => {
        menu.classList.toggle('is-open', isOpen);
        menuToggle.classList.toggle('is-open', isOpen);
        menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        menuToggle.setAttribute('aria-label', isOpen ? 'Cerrar menú' : 'Abrir menú');
    };

    /**
     * Deja solo un link activo a la vez.
     */
    const setActiveLink = (targetId) => {
        navLinks.forEach((link) => {
            const href = link.getAttribute('href');
            const isMatch = href === `#${targetId}`;
            link.classList.toggle('is-current', isMatch);
        });
    };

    // 1. Abrir o cerrar el menú mobile.
    menuToggle.addEventListener('click', () => {
        const isCurrentlyOpen = menu.classList.contains('is-open');
        setMenuState(!isCurrentlyOpen);
    });

    // 2. Al hacer click en un enlace, se marca como activo y se cierra el menú.
    navLinks.forEach((link) => {
        link.addEventListener('click', () => {
            const href = link.getAttribute('href');

            if (href && href.startsWith('#')) {
                const targetId = href.replace('#', '');
                setActiveLink(targetId);
            }

            setMenuState(false);
        });
    });

    // 3. Cerrar menú si se hace click fuera del área del nav.
    document.addEventListener('click', (event) => {
        const clickedInsideNav = event.target.closest('.nav');

        if (!clickedInsideNav && menu.classList.contains('is-open')) {
            setMenuState(false);
        }
    });

    // 4. Cerrar menú al volver a ancho desktop.
    window.addEventListener('resize', () => {
        if (window.innerWidth > 920) {
            setMenuState(false);
        }
    });

    /**
     * 5. Detecta la sección activa en pantalla y mueve
     * la clase azul a la opción correspondiente.
     *
     * Si el usuario llega al final del documento,
     * se fuerza la activación de la última sección: cotizar.
     */
    const updateActiveLinkOnScroll = () => {
        const scrollPosition = window.scrollY + 160;
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;

        // Si estamos al final de la página, activar siempre "cotizar".
        if (window.scrollY + windowHeight >= documentHeight - 10) {
            setActiveLink('cotizar');
            return;
        }

        let currentSectionId = sections[0].getAttribute('id');

        sections.forEach((section) => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (
                scrollPosition >= sectionTop &&
                scrollPosition < sectionTop + sectionHeight
            ) {
                currentSectionId = sectionId;
            }
        });

        setActiveLink(currentSectionId);
    };

    // Estado inicial.
    updateActiveLinkOnScroll();

    // Actualización al hacer scroll.
    window.addEventListener('scroll', updateActiveLinkOnScroll);
});
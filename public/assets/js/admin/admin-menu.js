/**
 * admin-menu.js
 * -----------------------------------------------------------
 * Controla el menú hamburguesa del panel de administración en
 * pantallas chicas (celular / tablet).
 *
 * Funciones:
 * 1. Abrir/cerrar el menú al presionar el botón.
 * 2. Cerrar el menú al hacer click en una opción.
 * 3. Cerrar el menú si se hace click fuera del sidebar.
 * 4. Cerrar el menú al volver a tamaño de escritorio.
 * -----------------------------------------------------------
 */

document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.admin-menu-toggle');
    const navWrap = document.querySelector('.admin-nav-wrap');

    if (!menuToggle || !navWrap) {
        return;
    }

    const setMenuState = (isOpen) => {
        navWrap.classList.toggle('is-open', isOpen);
        menuToggle.classList.toggle('is-open', isOpen);
        menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        menuToggle.setAttribute('aria-label', isOpen ? 'Cerrar menú' : 'Abrir menú');
    };

    // 1. Abrir o cerrar el menú.
    menuToggle.addEventListener('click', () => {
        setMenuState(!navWrap.classList.contains('is-open'));
    });

    // 2. Cerrar el menú al elegir una sección.
    navWrap.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => setMenuState(false));
    });

    // 3. Cerrar el menú si se hace click fuera del sidebar.
    document.addEventListener('click', (event) => {
        const clickedInsideSidebar = event.target.closest('.admin-sidebar');

        if (!clickedInsideSidebar && navWrap.classList.contains('is-open')) {
            setMenuState(false);
        }
    });

    // 4. Cerrar el menú al volver a ancho de escritorio.
    window.addEventListener('resize', () => {
        if (window.innerWidth > 780) {
            setMenuState(false);
        }
    });
});

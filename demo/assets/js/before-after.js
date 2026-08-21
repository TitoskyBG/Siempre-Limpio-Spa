/**
 * before-after.js
 * -----------------------------------------------------------
 * Controla la sección "Antes y después" de la página pública:
 *
 * 1. Slider de comparación de imágenes (antes/después) usando
 *    un input type="range" y clip-path para revelar la imagen
 *    "después" progresivamente.
 * 2. Sistema de pestañas para cambiar entre los distintos
 *    servicios mostrados (Pisos, Tapicería, Autos, etc.).
 * -----------------------------------------------------------
 */

document.addEventListener('DOMContentLoaded', () => {

    /**
     * PARTE 1: Slider de comparación de imágenes
     * -----------------------------------------------------------
     * Por cada elemento .ba-slider en la página, se conecta el
     * input range con la imagen "después" y con la barra divisoria,
     * para que ambas se muevan juntas según el valor del slider.
     */
    document.querySelectorAll('.ba-slider').forEach((slider) => {
        const range = slider.querySelector('.ba-range');
        const afterImage = slider.querySelector('.ba-image-after');
        const divider = slider.querySelector('.ba-divider');

        // Si falta algún elemento requerido, se omite este slider.
        if (!range || !afterImage || !divider) {
            return;
        }

        /**
         * Actualiza la posición de la imagen "después" (recorte)
         * y la posición visual de la barra divisoria/círculo.
         * @param {string|number} value - Valor actual del range (0-100).
         */
        const updateSlider = (value) => {
            afterImage.style.clipPath = `inset(0 ${100 - value}% 0 0)`;
            divider.style.left = `${value}%`;
        };

        // Estado inicial: se aplica el valor por defecto del range (ej: 50%).
        updateSlider(range.value);

        // Cada vez que el usuario mueve el slider, se actualiza en tiempo real.
        range.addEventListener('input', (event) => {
            updateSlider(event.target.value);
        });
    });

    /**
     * PARTE 2: Sistema de pestañas de servicios
     * -----------------------------------------------------------
     * Cambia el panel visible (.ba-panel) según la pestaña
     * seleccionada (.ba-tab), usando el atributo data-target
     * para saber qué panel mostrar.
     */
    const tabs = document.querySelectorAll('.ba-tab');
    const panels = document.querySelectorAll('.ba-panel');

    // Si no existen pestañas o paneles en la página, no hacemos nada más.
    if (tabs.length === 0 || panels.length === 0) {
        return;
    }

    tabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            const targetId = tab.dataset.target;
            const targetPanel = document.getElementById(targetId);

            if (!targetPanel) {
                return;
            }

            // Desactiva todas las pestañas y paneles antes de activar el nuevo.
            tabs.forEach((t) => {
                t.classList.remove('is-active');
                t.setAttribute('aria-selected', 'false');
            });

            panels.forEach((panel) => {
                panel.classList.remove('is-active');
            });

            // Activa la pestaña y el panel seleccionados.
            tab.classList.add('is-active');
            tab.setAttribute('aria-selected', 'true');
            targetPanel.classList.add('is-active');
        });
    });

});
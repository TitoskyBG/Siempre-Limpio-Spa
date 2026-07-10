/**
 * quote-form.js
 * -----------------------------------------------------------
 * Controla el comportamiento del formulario de la sección
 * "Cotizar":
 *
 * 1. Autorellena el campo "Servicio de interés" cuando el
 *    usuario presiona cualquier botón "Cotizar" de la página
 *    (usa el atributo data-service de cada botón).
 * 2. Simula el envío del formulario mostrando un mensaje de
 *    confirmación (hasta que se conecte a un controlador real
 *    en Laravel con su ruta y validación en backend).
 * -----------------------------------------------------------
 */

document.addEventListener('DOMContentLoaded', () => {

    const servicioInput = document.getElementById('cotizar-servicio');
    const cotizarButtons = document.querySelectorAll('.js-cotizar-btn');

    /**
     * PARTE 1: Autorelleno del campo "Servicio de interés"
     * -----------------------------------------------------------
     * Cada botón "Cotizar" tiene un atributo data-service con el
     * nombre exacto del servicio (ej: "Lavado de tapicería").
     * Al hacer click, ese valor se copia al input del formulario
     * antes de que el navegador haga scroll hasta #cotizar.
     */
    if (servicioInput && cotizarButtons.length > 0) {
        cotizarButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const servicio = button.dataset.service || '';

                // Solo se autorellena si el botón trae un servicio definido.
                if (servicio !== '') {
                    servicioInput.value = servicio;
                }
            });
        });
    }

    /**
     * PARTE 2: Envío simulado del formulario
     * -----------------------------------------------------------
     * Por ahora no existe backend conectado, así que se previene
     * el envío real y se muestra un mensaje de éxito en pantalla.
     * Cuando se cree la ruta y el controlador de cotizaciones,
     * este bloque se reemplaza por un envío real (fetch o submit
     * normal hacia el backend).
     */
    const quoteForm = document.getElementById('quote-form');
    const quoteSuccess = document.getElementById('quote-success');

    if (quoteForm && quoteSuccess) {
        quoteForm.addEventListener('submit', (event) => {
            event.preventDefault();

            // Aquí más adelante se validará y enviará la información al backend.
            quoteSuccess.hidden = false;
            quoteForm.reset();
        });
    }

});
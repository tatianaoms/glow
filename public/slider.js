function iniciarSlider() {
    let slides = document.querySelectorAll('.slide');
    let index = 0;

    // Solo se activa si encuentra elementos con la clase .slide
    if (slides.length > 0) {

        // Botón Siguiente: Pasa a la siguiente imagen
        const btnSiguiente = document.querySelector('.siguiente');
        if (btnSiguiente) {
            btnSiguiente.onclick = () => {
                slides[index].classList.remove('active');
                index = (index + 1) % slides.length;
                slides[index].classList.add('active');
            };
        }

        // Botón Anterior: Regresa a la imagen anterior
        const btnAnterior = document.querySelector('.anterior');
        if (btnAnterior) {
            btnAnterior.onclick = () => {
                slides[index].classList.remove('active');
                index = (index - 1 + slides.length) % slides.length;
                slides[index].classList.add('active');
            };
        }

        // Autoreproducir cada 2 segundos (como lo tenías configurado)
        setInterval(() => {
            if (btnSiguiente) btnSiguiente.click();
        }, 2000);
    }
}

// Llama a la función automáticamente al cargar la página
window.onload = iniciarSlider;
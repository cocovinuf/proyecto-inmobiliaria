// 1. Capturamos el botón por su id
const boton = document.getElementById('btnNuevaPersona');

// 2. Le agregamos el escuchador del evento click
boton.addEventListener('click', function() {
    
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalPersona');
    
    // 4. Creamos la instancia del modal de Bootstrap y lo mostramos
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();
});
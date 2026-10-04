// 1. Capturamos el botón por su id
const botonNuevaPersona = document.getElementById('btnNuevaPersona');
const botonEditarPersona = document.getElementById('btnEditarPersona');
const botonEliminarPersona = document.getElementById('btnEliminarPersona');

// 2. Le agregamos el escuchador del evento click
botonNuevaPersona.addEventListener('click', function() {
    
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalNuevaPersona');
    
    // 4. Creamos la instancia del modal de Bootstrap y lo mostramos
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();

});

botonEditarPersona.addEventListener('click', function() {
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalEditarPersona');
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();
});


botonEliminarPersona.addEventListener('click', function() {
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalEliminarPersona');
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();
});
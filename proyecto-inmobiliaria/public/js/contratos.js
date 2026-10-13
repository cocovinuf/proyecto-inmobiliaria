const botonNuevoContrato = document.getElementById('btnNuevoContrato');
const botonEditarContrato = document.getElementById('btnEditarContrato');
const botonEliminarContrato = document.getElementById('btnEliminarContrato');

// 2. Le agregamos el escuchador del evento click
botonNuevoContrato.addEventListener('click', function() {

    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalNuevoContrato');

    // 4. Creamos la instancia del modal de Bootstrap y lo mostramos
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();

});


botonEditarContrato.addEventListener('click', function() {
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalEditarContrato');
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();
});



botonEliminarContrato.addEventListener('click', function() {
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalEliminarContrato');
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();
});

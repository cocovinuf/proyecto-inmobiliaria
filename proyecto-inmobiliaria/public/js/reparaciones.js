const botonNuevaReparacion = document.getElementById('btnNuevaReparacion');
const botonEditarReparacion = document.getElementById('btnEditarReparacion');
const botonEliminarReparacion = document.getElementById('btnEliminarReparacion');

// 2. Le agregamos el escuchador del evento click
botonNuevaReparacion.addEventListener('click', function() {

    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalNuevaReparacion');

    // 4. Creamos la instancia del modal de Bootstrap y lo mostramos
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();

});


botonEditarReparacion.addEventListener('click', function() {
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalEditarReparacion');
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();
});



botonEliminarReparacion.addEventListener('click', function() {
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalEliminarReparacion');
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();
});

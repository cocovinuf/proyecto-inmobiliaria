const botonNuevoInmueble = document.getElementById('btnNuevoInmueble');
const botonEditarInmueble = document.getElementById('btnEditarInmueble');
const botonEliminarInmueble = document.getElementById('btnEliminarInmueble');

// 2. Le agregamos el escuchador del evento click
botonNuevoInmueble.addEventListener('click', function() {
    
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalNuevoInmueble');
    
    // 4. Creamos la instancia del modal de Bootstrap y lo mostramos
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();

});


botonEditarInmueble.addEventListener('click', function() {
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalEditarInmueble');
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();
});



botonEliminarInmueble.addEventListener('click', function() {
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalEliminarInmueble');
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();
});
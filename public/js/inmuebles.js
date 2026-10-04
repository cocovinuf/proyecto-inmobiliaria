const botonNuevoInmueble = document.getElementById('btnNuevoInmueble');


// 2. Le agregamos el escuchador del evento click
botonNuevoInmueble.addEventListener('click', function() {
    
    // 3. Buscamos el elemento modal en el DOM
    const elementoModal = document.getElementById('modalNuevoInmueble');
    
    // 4. Creamos la instancia del modal de Bootstrap y lo mostramos
    const modalBootstrap = new bootstrap.Modal(elementoModal);
    modalBootstrap.show();

});
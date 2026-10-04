var tablaInmuebles = new Tabulator("#tabla-inmuebles", {
    ajaxURL: "/api/inmuebles-datos", 
    height: "60%", // Define la altura de la "ventana" (puedes usar "100%", "60vh", etc.)
    pagination: "local",
    paginationSize: 20,
    selectable: 1,
    layout: "fitData", 
    // Eliminamos responsiveLayout para que no oculte las columnas
    
    columns: [
        { title: "ID", field: "id", hozAlign: "center", headerFilter:"number" },
        {title: "Propietario",field: "propietario", headerFilter:"number"},
        { title: "Alias", field: "alias", headerFilter: "input"  },
        { title: "Tipo", field: "tipo" , headerFilter: "input" },
        { title: "Edificio", field: "nombre_edificio" , headerFilter: "input" },
        { title: "Calle", field: "calle", headerFilter: "input" },
        { title: "Numeracion", field: "numeracion", headerFilter: "input" },
        { title: "UF", field: "unidad_funcional" , headerFilter: "input" },
        { title: "Sup.", field: "superficie" , sorter:"number", headerFilter:"number"},
        { title: "Amb.", field: "cantidad_ambientes", hozAlign: "center", headerFilter:"number" },
        { title: "Dorm.", field: "cantidad_dormitorios", hozAlign: "center" , headerFilter:"number"},
        { title: "Baños", field: "cantidad_banios", hozAlign: "center" , headerFilter:"number"},

        { title: "Cochera", field: "cochera", hozAlign: "center" , headerFilter:"number"},
        { title: "Quincho", field: "quincho", formatter: "tickCross", hozAlign: "center" },
        { title: "Parrilla", field: "parrilla", formatter: "tickCross", hozAlign: "center" },
        { title: "SUM", field: "sum", formatter: "tickCross", hozAlign: "center" },
        { title: "Piscina", field: "piscina", formatter: "tickCross", hozAlign: "center" },
        { title: "Gimnasio", field: "gimnasio", formatter: "tickCross", hozAlign: "center" },
        { title: "Solarium", field: "solarium", formatter: "tickCross", hozAlign: "center" },
        { title: "Vigilancia", field: "vigilancia", formatter: "tickCross", hozAlign: "center" },
        { title: "Jardín", field: "jardin", formatter: "tickCross", hozAlign: "center" },
        { title: "Lavandería", field: "lavanderia", formatter: "tickCross", hozAlign: "center" },
        { title: "Terraza", field: "terraza", formatter: "tickCross", hozAlign: "center" },
        { title: "Deportes", field: "cancha_de_deportes", formatter: "tickCross", hozAlign: "center" },
        { title: "Sauna", field: "sauna", formatter: "tickCross", hozAlign: "center" },
        { title: "Reuniones", field: "sala_de_reuniones", formatter: "tickCross", hozAlign: "center" },
        { title: "Lockers", field: "lockers_de_paqueteria", formatter: "tickCross", hozAlign: "center" },
        { title: "Coworking", field: "espacio_coworking", formatter: "tickCross", hozAlign: "center" },
        { title: "Juegos", field: "sala_de_juegos", formatter: "tickCross", hozAlign: "center" }
    
        
    ],
});


tablaInmuebles.on("rowSelected", function(row){
    let datosFila = row.getData();
    let id = datosFila.id;
    let propietarioId = datosFila.propietario_id;
    let alias = datosFila.alias;
    let tipo = datosFila.tipo;
    let nombre_edificio = datosFila.nombre_edificio;
    let calle = datosFila.calle;
    let numeracion = datosFila.numeracion;
    let piso = datosFila.piso;
    let departamento = datosFila.departamento;
    let unidad_funcional = datosFila.unidad_funcional;
    let superficie = datosFila.superficie;
    let cantidad_ambientes = datosFila.cantidad_ambientes;
    let cantidad_dormitorios = datosFila.cantidad_dormitorios;
    let cantidad_banios = datosFila.cantidad_banios;
    let cochera = datosFila.cochera;
    let quincho = datosFila.quincho;
    let parrilla = datosFila.parrilla;
    let sum = datosFila.sum;
    let piscina = datosFila.piscina;
    let gimnasio = datosFila.gimnasio;
    let solarium = datosFila.solarium;
    let vigilancia = datosFila.vigilancia;
    let jardin = datosFila.jardin;
    let lavanderia = datosFila.lavanderia;
    let terraza = datosFila.terraza;
    let cancha_de_deportes = datosFila.cancha_de_deportes;
    let sauna = datosFila.sauna;
    let sala_de_reuniones = datosFila.sala_de_reuniones;
    let lockers_de_paqueteria = datosFila.lockers_de_paqueteria;
    let espacio_coworking = datosFila.espacio_coworking;
    let sala_de_juegos = datosFila.sala_de_juegos;
    
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_propietario_id').value = propietarioId;
    document.getElementById('edit_alias').value = alias;
    document.getElementById('edit_tipo').value = tipo;
    document.getElementById('edit_nombre_edificio').value = nombre_edificio;
    document.getElementById('edit_calle').value = calle;
    document.getElementById('edit_piso').value = piso;
    document.getElementById('edit_departamento').value = departamento;
    document.getElementById('edit_numeracion').value = numeracion;
    document.getElementById('edit_unidad_funcional').value = unidad_funcional;
    document.getElementById('edit_superficie').value = superficie;
    document.getElementById('edit_cantidad_ambientes').value = cantidad_ambientes;
    document.getElementById('edit_cantidad_dormitorios').value = cantidad_dormitorios;
    document.getElementById('edit_cantidad_banios').value = cantidad_banios;
    document.getElementById('edit_cochera').value = cochera;
    document.getElementById('edit_quincho').checked = quincho;
    document.getElementById('edit_parrilla').checked = parrilla;
    document.getElementById('edit_sum').checked = sum;
    document.getElementById('edit_piscina').checked = piscina;
    document.getElementById('edit_gimnasio').checked = gimnasio;
    document.getElementById('edit_solarium').checked = solarium;
    document.getElementById('edit_vigilancia').checked = vigilancia;
    document.getElementById('edit_jardin').checked = jardin;
    document.getElementById('edit_lavanderia').checked = lavanderia;
    document.getElementById('edit_terraza').checked = terraza;
    document.getElementById('edit_cancha_de_deportes').checked = cancha_de_deportes;
    document.getElementById('edit_sauna').checked = sauna;
    document.getElementById('edit_sala_de_reuniones').checked = sala_de_reuniones;
    document.getElementById('edit_lockers_de_paqueteria').checked = lockers_de_paqueteria;
    document.getElementById('edit_espacio_coworking').checked = espacio_coworking;
    document.getElementById('edit_sala_de_juegos').checked = sala_de_juegos;
    


    document.getElementById('eliminar_id').value = id;
    document.getElementById('eliminar_propietario_id').value = propietarioId;
    document.getElementById('eliminar_alias').value = alias;
    document.getElementById('eliminar_tipo').value = tipo;
    document.getElementById('eliminar_nombre_edificio').value = nombre_edificio;
    document.getElementById('eliminar_calle').value = calle;
    document.getElementById('eliminar_piso').value = piso;
    document.getElementById('eliminar_departamento').value = departamento;
    document.getElementById('eliminar_numeracion').value = numeracion;
    document.getElementById('eliminar_unidad_funcional').value = unidad_funcional;
    document.getElementById('eliminar_superficie').value = superficie;
    document.getElementById('eliminar_cantidad_ambientes').value = cantidad_ambientes;
    document.getElementById('eliminar_cantidad_dormitorios').value = cantidad_dormitorios;
    document.getElementById('eliminar_cantidad_banios').value = cantidad_banios;
    document.getElementById('eliminar_cochera').value = cochera;
    document.getElementById('eliminar_quincho').checked = quincho;
    document.getElementById('eliminar_parrilla').checked = parrilla;
    document.getElementById('eliminar_sum').checked = sum;
    document.getElementById('eliminar_piscina').checked = piscina;
    document.getElementById('eliminar_gimnasio').checked = gimnasio;
    document.getElementById('eliminar_solarium').checked = solarium;
    document.getElementById('eliminar_vigilancia').checked = vigilancia;
    document.getElementById('eliminar_jardin').checked = jardin;
    document.getElementById('eliminar_lavanderia').checked = lavanderia;
    document.getElementById('eliminar_terraza').checked = terraza;
    document.getElementById('eliminar_cancha_de_deportes').checked = cancha_de_deportes;
    document.getElementById('eliminar_sauna').checked = sauna;
    document.getElementById('eliminar_sala_de_reuniones').checked = sala_de_reuniones;
    document.getElementById('eliminar_lockers_de_paqueteria').checked = lockers_de_paqueteria;
    document.getElementById('eliminar_espacio_coworking').checked = espacio_coworking;
    document.getElementById('eliminar_sala_de_juegos').checked = sala_de_juegos;
    


})
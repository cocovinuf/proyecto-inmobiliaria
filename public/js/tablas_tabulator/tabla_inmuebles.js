var tablaInmuebles = new Tabulator("#tabla-inmuebles", {
    ajaxURL: "/api/inmuebles-datos", 
    height: "60%", // Define la altura de la "ventana" (puedes usar "100%", "60vh", etc.)
    pagination: "local",
    paginationSize: 20,
    layout: "fitData", 
    // Eliminamos responsiveLayout para que no oculte las columnas
    
    columns: [
        { title: "ID", field: "id", hozAlign: "center" },
        {title: "ID Propietario",field: "propietario_id"},
        { title: "Alias", field: "alias", headerFilter: "input"  },
        { title: "Tipo", field: "tipo" , headerFilter: "input" },
        { title: "Edificio", field: "nombre_edificio" , headerFilter: "input" },
        { title: "Dirección", field: "direccion", headerFilter: "input" },
        { title: "UF", field: "unidad_funcional" , headerFilter: "input" },
        { title: "Sup.", field: "superficie" , headerFilter: "input" },
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
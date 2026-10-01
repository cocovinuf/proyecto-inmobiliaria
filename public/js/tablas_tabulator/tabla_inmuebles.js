var tablaInmuebles = new Tabulator("#tabla-inmuebles", {
    ajaxURL: "/api/inmuebles-datos", 
    height: "500px", // Define la altura de la "ventana" (puedes usar "100%", "60vh", etc.)
    layout: "fitData", // Permite que las columnas mantengan su tamaño y genera el scroll horizontal
    pagination: "local",
    paginationSize: 15,
    // Eliminamos responsiveLayout para que no oculte las columnas
    
    columns: [
        { title: "ID", field: "id", width: 60, hozAlign: "center" },
        
        // Relación: Propietario
        { 
            title: "Propietario", 
            field: "propietario", 
            formatter: function(cell) {
                let prop = cell.getValue();
                return prop ? prop.apellido + ", " + prop.nombre : "Sin asignar";
            }
        },

        // Datos Principales
        { title: "Alias", field: "alias" },
        { title: "Tipo", field: "tipo" },
        { title: "Edificio", field: "nombre_edificio" },
        
        // Ubicación unificada en una sola columna para ahorrar espacio
        { 
            title: "Dirección", 
            formatter: function(cell) {
                let data = cell.getData();
                let dir = data.calle + " " + data.numeracion;
                if(data.piso) dir += " - Piso " + data.piso;
                if(data.departamento) dir += " " + data.departamento;
                return dir;
            }
        },
        
        { title: "UF", field: "unidad_funcional" },

        // Dimensiones
        { title: "Sup.", field: "superficie" },
        { title: "Amb.", field: "cantidad_ambientes", hozAlign: "center" },
        { title: "Dorm.", field: "cantidad_dormitorios", hozAlign: "center" },
        { title: "Baños", field: "cantidad_banios", hozAlign: "center" },

        // Comodidades (Booleanos convertidos a tildes/cruces visuales)
       
            
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
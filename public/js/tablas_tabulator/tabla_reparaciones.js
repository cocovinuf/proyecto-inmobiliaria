document.addEventListener('DOMContentLoaded', function() {
    
    let contenedorTabla = document.getElementById("tabla-reparaciones");
    let rutaJson = contenedorTabla ? contenedorTabla.getAttribute("data-url") : "/api/reparaciones-datos";

    var tablaReparaciones = new Tabulator("#tabla-reparaciones", {
        ajaxURL: rutaJson,
        height: "720px", 
        pagination: "local",
        paginationSize: 20,
        layout: "fitDataStretch", 
        selectableRows: 1, 
        
        // Habilitación dinámica de los botones
        rowSelectionChanged: function(data, rows) {
            let btnEditar = document.getElementById('btn-editar');
            let btnEliminar = document.getElementById('btn-eliminar');
            
            if (btnEditar && btnEliminar) {
                if(rows.length > 0) {
                    btnEditar.removeAttribute('disabled');
                    btnEliminar.removeAttribute('disabled');
                } else {
                    btnEditar.setAttribute('disabled', 'disabled');
                    btnEliminar.setAttribute('disabled', 'disabled');
                }
            }
        },
        
        columns: [
            { title: "ID", field: "id", width: 60, hozAlign: "center" },
            { title: "Inmueble_id", field: "inmueble_id"},
            { title: "Descripción", field: "descripcion", width: 250 }, // Más ancha para el texto
            { title: "Inicio", field: "fecha_inicio", hozAlign: "center",},
            { title: "Finalización", field: "fecha_finalizacion", hozAlign: "center",},
            { title: "Costo", field: "monto", formatter: "money", formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 }},
            {title: "Comprobante", field: "comprobante",hozAlign: "center"}
            
        ]
    });
});
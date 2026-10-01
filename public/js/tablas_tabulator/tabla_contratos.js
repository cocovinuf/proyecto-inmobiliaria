document.addEventListener('DOMContentLoaded', function() {
    
    var tablaContenedor = document.getElementById("tabla-contratos");
    
    if (tablaContenedor) {
        var urlDatos = tablaContenedor.dataset.url;

        var table = new Tabulator("#tabla-contratos", {
            ajaxURL: tablaContenedor.dataset.url,
            layout: "fitColumns", // Ajusta las columnas al ancho de la tabla
            pagination: "local",
            paginationSize: 10,
            columns: [
                { title: "ID", field: "id", width: 70, hozAlign: "center" },
                { title: "Inmueble ID", field: "inmueble_id", width: 100, hozAlign: "center"},
                { title: "Fecha Inicio", field: "fecha_inicio", width: 130, hozAlign: "center"},
                { title: "Fecha Finalización", field: "fecha_finalizacion", width: 130, hozAlign: "center"},
                { title: "Monto Inicial", field: "monto_inicial", width: 120, hozAlign: "right"},
                { title: "Monto Actual", field: "monto_actual", width: 120, hozAlign: "right"},
                { title: "Periodo", field: "periodo_actualizacion", width: 110, hozAlign: "center", },
                { title: "Índice", field: "indice_actualizacion", width: 90, hozAlign: "center", },
                { title: "Estado", field: "estado", width: 90, hozAlign: "center"},
               
                
            ],
        });
    }
});
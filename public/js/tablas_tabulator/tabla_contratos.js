document.addEventListener('DOMContentLoaded', function() {
    
    var tablaContenedor = document.getElementById("tabla-contratos");
    
    if (tablaContenedor) {
        var urlDatos = tablaContenedor.dataset.url;

        var table = new Tabulator("#tabla-contratos", {
            ajaxURL: tablaContenedor.dataset.url,
            height: "60%", 
            pagination: "local",
            paginationSize: 20,
            layout: "fitData", 
            renderHorizontal:"virtual",
            columns: [
                { title: "ID", field: "id", headerFilter: "input" },
                { title: "Alias", field: "alias", width: 100, hozAlign: "center",headerFilter: "input"},
                { title: "Inmueble", field: "inmueble_id", hozAlign: "center"},
                { title: "Propietario", field: "datos_propietario", hozAlign: "center"},
                { title: "Inquilino", field: "datos_inquilino", hozAlign: "center"},
                { title: "Garante", field: "datos_garante", hozAlign: "center"},
                { title: "Inicio", field: "fecha_inicio",  hozAlign: "center",headerFilter: "input"},
                { title: "Finalización", field: "fecha_finalizacion",  hozAlign: "center",headerFilter: "input"},
                { title: "Monto Inicial", field: "monto_inicial",  hozAlign: "right",headerFilter: "input"},
                { title: "Monto Actual", field: "monto_actual",  hozAlign: "right",headerFilter: "input"},
                { title: "Periodo", field: "periodo_actualizacion",  hozAlign: "center",headerFilter: "input" },
                { title: "Índice", field: "indice_actualizacion",  hozAlign: "center",headerFilter: "input" },
                { title: "Estado", field: "estado",  hozAlign: "center",headerFilter: "input"},
                { title: "Historico Aranceles", field: "historico_aranceles",  hozAlign: "center"},
               
                
            ],
        });
    }
});
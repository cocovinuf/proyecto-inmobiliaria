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
                { title: "Inmueble", field: "inmueble_alias", hozAlign: "center",headerFilter: "input"},
                { title: "Propietario", field: "propietario", hozAlign: "center",headerFilter: "input"},
                { title: "Inquilino", field: "inquilinos_texto", hozAlign: "center",headerFilter: "input"},
                { title: "Garante", field: "garantes_texto", hozAlign: "center",headerFilter: "input"},
                { title: "Inicio", field: "fecha_inicio",  hozAlign: "center",headerFilter: "input"},
                { title: "Finalización", field: "fecha_finalizacion",  hozAlign: "center",headerFilter: "input"},
                { title: "Monto Inicial", field: "monto_inicial",  hozAlign: "right",headerFilter: "input" , formatter: "money", formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 }},
                { title: "Monto Actual", field: "monto_actual",  hozAlign: "right",headerFilter: "input", formatter: "money", formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 }},
                { title: "Periodo", field: "periodo_actualizacion",  hozAlign: "center",headerFilter: "input" },
                { title: "Índice", field: "indice_actualizacion",  hozAlign: "center",headerFilter: "input" },
                { title: "Estado", field: "estado",  hozAlign: "center",headerFilter: "input"},
                { title: "Historico Aranceles", field: "historico_aranceles",  hozAlign: "center"},
               
                
            ],
        });
    }
});
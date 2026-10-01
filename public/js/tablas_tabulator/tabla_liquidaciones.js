document.addEventListener('DOMContentLoaded', function() {
    
    let contenedorTabla = document.getElementById("tabla-liquidaciones");
    let rutaJson = contenedorTabla ? contenedorTabla.getAttribute("data-url") : "/api/liquidaciones-datos";

    var tablaLiquidaciones = new Tabulator("#tabla-liquidaciones", {
        ajaxURL: rutaJson,
        height: "500px", 
        layout: "fitData", 
        pagination: "local",
        paginationSize: 15,
        selectableRows: 1, 
        
        // Habilitación dinámica de los botones Editar y Eliminar
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
            { title: "N° Contrato", field: "contrato_id", hozAlign: "center" },
            { title: "Período", field: "periodo" },
            
            // Usamos formatter "money" para que se vea como moneda automáticamente
            { 
                title: "Alquiler", 
                field: "monto_alquiler", 
                formatter: "money", 
                formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 } 
            },
            { 
                title: "Expensas", 
                field: "monto_expensa", 
                formatter: "money", 
                formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 } 
            },
            
            { 
                title: "Fecha Pagado", 
                field: "pagado", 
                hozAlign: "center",
                formatter: function(cell) {
                    let valor = cell.getValue();
                    return valor ? valor : '<span class="text-danger">Pendiente</span>';
                }
            },
            { 
                title: "Fecha Rendido", 
                field: "rendido", 
                hozAlign: "center",
                formatter: function(cell) {
                    let valor = cell.getValue();
                    return valor ? valor : '<span class="text-warning">Pendiente</span>';
                }
            }
        ]
    });
});
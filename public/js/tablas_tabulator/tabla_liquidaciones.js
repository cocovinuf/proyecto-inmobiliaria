document.addEventListener('DOMContentLoaded', function() {
    let contenedorTabla = document.getElementById("tabla-liquidaciones");
    let rutaJson = contenedorTabla ? contenedorTabla.getAttribute("data-url") : "/api/liquidaciones-datos";

    var tablaLiquidaciones = new Tabulator("#tabla-liquidaciones", {
        ajaxURL: rutaJson,
        height: "720px", 
        pagination: "local",
        paginationSize: 20,
        layout: "fitDataStretch", 
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
            { title: "ID", field: "id", hozAlign: "center" },
            { title: "ID Contrato", field: "contrato_id", hozAlign: "center" },
            { title: "Período", field: "periodo" },
            
            // Usamos formatter "money" para que se vea como moneda automáticamente
            { title: "Alquiler", field: "monto_alquiler", formatter: "money", formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 } },
            { title: "Expensas", field: "monto_expensa", formatter: "money", formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 } },
            
            { title: "Fecha Pagado", field: "pagado", hozAlign: "center"},
            { title: "Fecha Rendido", field: "rendido", hozAlign: "center",},
            { title: "Arancel Administracion", field: "arancel", formatter: "money", formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 } },
            { title: "A rendir", field: "rendicion", formatter: "money", formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 } },
        ]
    });
});
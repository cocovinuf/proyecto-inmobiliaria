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
                { title: "Inmueble ID", field: "inmueble_id", width: 100, hozAlign: "center", headerVertical:true },
                { title: "Fecha Inicio", field: "fecha_inicio", width: 130, hozAlign: "center", headerVertical:true },
                { title: "Fecha Finalización", field: "fecha_finalizacion", width: 130, hozAlign: "center", headerVertical:true },
                { title: "Monto Inicial", field: "monto_inicial", width: 120, hozAlign: "right", headerVertical:true },
                { title: "Monto Actual", field: "monto_actual", width: 120, hozAlign: "right", headerVertical:true },
                { title: "Periodo", field: "periodo_actualizacion", width: 110, hozAlign: "center", headerVertical:true },
                { title: "Índice", field: "indice_actualizacion", width: 90, hozAlign: "center", headerVertical:true },
                { title: "Duración", field: "duracion", width: 90, hozAlign: "center", headerVertical:true },
                { 
                    title: "Acciones", 
                    width: 110,
                    hozAlign: "center",
                    headerVertical:true,
                    formatter: function(cell, formatterParams, onRendered){
                        return `<button class="btn btn-sm btn-light border text-primary" title="Ver detalles">
                                    <i class="fa-solid fa-eye"></i> Detalles
                                </button>`;
                    },
                    cellClick: function(e, cell){
                        let data = cell.getRow().getData();
                        console.log("ID seleccionado: " + data.id);
                    }
                }
            ],
        });
    }
});
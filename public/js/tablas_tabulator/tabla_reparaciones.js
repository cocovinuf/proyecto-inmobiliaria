document.addEventListener('DOMContentLoaded', function() {
    
    let contenedorTabla = document.getElementById("tabla-reparaciones");
    let rutaJson = contenedorTabla ? contenedorTabla.getAttribute("data-url") : "/api/reparaciones-datos";

    // Función auxiliar para dar vuelta la fecha (de YYYY-MM-DD a DD/MM/YYYY)
    function formatearFechaLocal(cell) {
        let valor = cell.getValue();
        if (!valor) return '<span class="text-muted">Pendiente</span>';
        
        // Laravel manda la fecha casteada como string, extraemos solo la parte YYYY-MM-DD
        let partes = valor.split('T')[0].split('-'); 
        if (partes.length === 3) {
            return `${partes[2]}/${partes[1]}/${partes[0]}`;
        }
        return valor;
    }

    var tablaReparaciones = new Tabulator("#tabla-reparaciones", {
        ajaxURL: rutaJson,
        height: "500px", 
        layout: "fitData", 
        pagination: "local",
        paginationSize: 15,
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
            
            // Relación con Inmueble (Leemos el objeto anidado)
            { 
                title: "Inmueble", 
                field: "inmueble", 
                formatter: function(cell) {
                    let inm = cell.getValue();
                    // Mostramos el alias, o la calle si no tiene alias
                    return inm ? (inm.alias || inm.calle + " " + inm.numeracion) : "Sin asignar";
                }
            },
            
            { title: "Descripción", field: "descripcion", width: 250 }, // Más ancha para el texto
            
            // Fechas formateadas
            { title: "Inicio", field: "fecha_inicio", hozAlign: "center", formatter: formatearFechaLocal },
            { title: "Finalización", field: "fecha_finalizacion", hozAlign: "center", formatter: formatearFechaLocal },
            
            // Monto en moneda
            { 
                title: "Costo", 
                field: "monto", 
                formatter: "money", 
                formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 } 
            },
            
            // Botón visual para el comprobante
            { 
                title: "Comprobante", 
                field: "comprobante", 
                hozAlign: "center",
                formatter: function(cell) {
                    let archivo = cell.getValue();
                    if (archivo) {
                        return `<a href="/storage/${archivo}" target="_blank" class="btn btn-sm btn-outline-secondary py-0" style="font-size: 0.8rem;">
                                    <i class="fa-solid fa-file-invoice"></i> Ver
                                </a>`;
                    }
                    return '<span class="text-muted">Sin adjunto</span>';
                }
            }
        ]
    });
});
// Capturamos el contenedor por si usas el atributo data-url en el HTML
let contenedorTablaPersonas = document.getElementById("tabla-personas");
let rutaJsonPersonas = contenedorTablaPersonas ? contenedorTablaPersonas.getAttribute("data-url") : "/api/personas-datos";

var tablaPersonas = new Tabulator("#tabla-personas", {
    ajaxURL: rutaJsonPersonas,
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
        
        // Datos Personales
        { title: "Apellido", field: "apellido" },
        { title: "Nombre", field: "nombre" },
        { title: "DNI", field: "dni" },
        { title: "Teléfono", field: "num_telefono" },
        { title: "Banco", field: "nombre_banco" },
        { title: "Titular", field: "titular_cuenta" },
        { title: "Cuenta N°", field: "num_cuenta_bancaria" },
        { title: "CBU", field: "cbu" }, 


        // Botón visual para la documentación adjunta
        { 
            title: "Documentación", 
            field: "documentacion", 
            hozAlign: "center",
            formatter: function(cell) {
                let archivo = cell.getValue();
                // Si hay un archivo cargado, genera un botón para abrirlo en otra pestaña.
                // Asume que los archivos están guardados en el disco public de Laravel.
                if (archivo) {
                    return `<a href="/storage/${archivo}" target="_blank" class="btn btn-sm btn-outline-primary py-0" style="font-size: 0.8rem;">
                                <i class="fa-solid fa-file-pdf"></i> Ver
                            </a>`;
                }
                return '<span class="text-muted">Sin adjunto</span>';
            }
        }
    ],
});
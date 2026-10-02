// Capturamos el contenedor por si usas el atributo data-url en el HTML
let contenedorTablaPersonas = document.getElementById("tabla-personas");
let rutaJsonPersonas = contenedorTablaPersonas ? contenedorTablaPersonas.getAttribute("data-url") : "/api/personas-datos";

var tablaPersonas = new Tabulator("#tabla-personas", {
    ajaxURL: rutaJsonPersonas,
    height: "720px", 
    layout: "fitDataStretch", 
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
        { title: "ID", field: "id",  hozAlign: "center" , headerFilter: "input" },
        
        // Datos Personales
        { title: "Apellido", field: "apellido", headerFilter: "input"},
        { title: "Nombre", field: "nombre", headerFilter: "input" },
        { title: "DNI", field: "dni", headerFilter: "input" },
        { title: "Teléfono", field: "num_telefono" , headerFilter: "input" },
        { title: "Banco", field: "nombre_banco" , headerFilter: "input"},
        { title: "Titular", field: "titular_cuenta" , headerFilter: "input"},
        { title: "Cuenta N°", field: "num_cuenta_bancaria" },
        { title: "CBU", field: "cbu" }, 
        { title: "Documentación", field: "documentacion"},
        
    ],
});
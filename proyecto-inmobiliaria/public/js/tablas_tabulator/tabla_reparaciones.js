var tablaReparaciones = new Tabulator("#tabla-reparaciones", {
    ajaxURL: "/api/reparaciones-datos",
    height: "720px",
    pagination: "local",
    paginationSize: 20,
    selectable: 1,
    layout: "fitDataStretch",

    columns: [
        { title: "ID", field: "id", hozAlign: "center", headerFilter: "input" },
        { title: "Inmueble", field: "inmueble_alias", hozAlign: "center", headerFilter: "input" },
        { title: "Descripción", field: "descripcion", width: 250, headerFilter: "input" }, // Más ancha para el texto
        { title: "Inicio", field: "fecha_inicio", hozAlign: "center", headerFilter: "input" },
        { title: "Finalización", field: "fecha_finalizacion", hozAlign: "center", headerFilter: "input" },
        { title: "Costo", field: "monto", formatter: "money", formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 }, headerFilter: "input" },
        { title: "Comprobante", field: "comprobante", hozAlign: "center", headerFilter: "input" }

    ]
});


tablaReparaciones.on("rowSelected", function(row){
    let datosFila = row.getData();
    let id = datosFila.id;
    let inmuebleId = datosFila.inmueble_id;
    let descripcion = datosFila.descripcion;
    let fechaInicio = datosFila.fecha_inicio_raw;
    let fechaFinalizacion = datosFila.fecha_finalizacion_raw;
    let monto = datosFila.monto;
    let comprobante = datosFila.comprobante;

    document.getElementById('edit_id').value = id;
    document.getElementById('edit_inmueble_id').value = inmuebleId;
    document.getElementById('edit_descripcion').value = descripcion;
    document.getElementById('edit_fecha_inicio').value = fechaInicio;
    document.getElementById('edit_fecha_finalizacion').value = fechaFinalizacion;
    document.getElementById('edit_monto').value = monto;
    document.getElementById('edit_comprobante').value = comprobante;



    document.getElementById('eliminar_id').value = id;
    document.getElementById('eliminar_inmueble_id').value = inmuebleId;
    document.getElementById('eliminar_descripcion').value = descripcion;
    document.getElementById('eliminar_fecha_inicio').value = fechaInicio;
    document.getElementById('eliminar_fecha_finalizacion').value = fechaFinalizacion;
    document.getElementById('eliminar_monto').value = monto;
    document.getElementById('eliminar_comprobante').value = comprobante;



})

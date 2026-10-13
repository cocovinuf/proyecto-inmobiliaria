var tablaContratos = new Tabulator("#tabla-contratos", {
    ajaxURL: "/api/contratos-datos",
    height: "60%", // Define la altura de la "ventana" (puedes usar "100%", "60vh", etc.)
    pagination: "local",
    paginationSize: 20,
    selectable: 1,
    layout: "fitData",
    // Eliminamos responsiveLayout para que no oculte las columnas

    columns: [
        { title: "ID", field: "id", hozAlign: "center", headerFilter: "input" },
        { title: "Alias", field: "alias", width: 100, hozAlign: "center", headerFilter: "input" },
        { title: "Inmueble", field: "inmueble_alias", hozAlign: "center", headerFilter: "input" },
        { title: "Propietario", field: "propietario", hozAlign: "center", headerFilter: "input" },
        { title: "Inquilino", field: "inquilinos_texto", hozAlign: "center", headerFilter: "input" },
        { title: "Garante", field: "garantes_texto", hozAlign: "center", headerFilter: "input" },
        { title: "Inicio", field: "fecha_inicio", hozAlign: "center", headerFilter: "input" },
        { title: "Finalización", field: "fecha_finalizacion", hozAlign: "center", headerFilter: "input" },
        { title: "Monto Inicial", field: "monto_inicial", hozAlign: "right", headerFilter: "input", formatter: "money", formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 } },
        { title: "Monto Actual", field: "monto_actual", hozAlign: "right", headerFilter: "input", formatter: "money", formatterParams: { symbol: "$", decimal: ",", thousand: ".", precision: 2 } },
        { title: "Periodo", field: "periodo_actualizacion", hozAlign: "center", headerFilter: "input" },
        { title: "Índice", field: "indice_actualizacion", hozAlign: "center", headerFilter: "input" },
        { title: "Estado", field: "estado", hozAlign: "center", headerFilter: "input" },
    ],
});


// Marca como seleccionadas las opciones de un <select multiple> segun un array de ids
function marcarSeleccionados(selectId, ids) {
    const select = document.getElementById(selectId);
    if (!select) return;
    const lista = Array.isArray(ids) ? ids.map(String) : [];
    Array.from(select.options).forEach(function (opt) {
        opt.selected = lista.includes(String(opt.value));
    });
}


tablaContratos.on("rowSelected", function(row){
    let datosFila = row.getData();
    let id = datosFila.id;
    let alias = datosFila.alias;
    let inmuebleId = datosFila.inmueble_id;
    let fechaInicio = datosFila.fecha_inicio_raw;
    let fechaFinalizacion = datosFila.fecha_finalizacion_raw;
    let montoInicial = datosFila.monto_inicial;
    let montoActual = datosFila.monto_actual;
    let periodo = datosFila.periodo_actualizacion;
    let indice = datosFila.indice_actualizacion;
    let estado = datosFila.estado;
    let inquilinosIds = datosFila.inquilinos_ids;
    let garantesIds = datosFila.garantes_ids;
    let inquilinosTexto = datosFila.inquilinos_texto;
    let garantesTexto = datosFila.garantes_texto;

    document.getElementById('edit_id').value = id;
    document.getElementById('edit_alias').value = alias;
    document.getElementById('edit_inmueble_id').value = inmuebleId;
    document.getElementById('edit_fecha_inicio').value = fechaInicio;
    document.getElementById('edit_fecha_finalizacion').value = fechaFinalizacion;
    document.getElementById('edit_monto_inicial').value = montoInicial;
    document.getElementById('edit_monto_actual').value = montoActual;
    document.getElementById('edit_periodo_actualizacion').value = periodo;
    document.getElementById('edit_indice_actualizacion').value = indice;
    document.getElementById('edit_estado').value = estado;
    marcarSeleccionados('edit_inquilinos', inquilinosIds);
    marcarSeleccionados('edit_garantes', garantesIds);



    document.getElementById('eliminar_id').value = id;
    document.getElementById('eliminar_alias').value = alias;
    document.getElementById('eliminar_inmueble_id').value = inmuebleId;
    document.getElementById('eliminar_fecha_inicio').value = fechaInicio;
    document.getElementById('eliminar_fecha_finalizacion').value = fechaFinalizacion;
    document.getElementById('eliminar_monto_inicial').value = montoInicial;
    document.getElementById('eliminar_monto_actual').value = montoActual;
    document.getElementById('eliminar_periodo_actualizacion').value = periodo;
    document.getElementById('eliminar_indice_actualizacion').value = indice;
    document.getElementById('eliminar_estado').value = estado;
    document.getElementById('eliminar_inquilinos').value = inquilinosTexto;
    document.getElementById('eliminar_garantes').value = garantesTexto;



})

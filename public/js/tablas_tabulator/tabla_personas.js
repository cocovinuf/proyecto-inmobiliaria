
// 2. Inicializamos Tabulator
var tablaPersonas = new Tabulator("#tabla-personas", {
    ajaxURL: "/api/personas-datos",
    height: "720px",
    layout: "fitDataStretch",
    pagination: "local",
    paginationSize: 15,
    selectable: 1, // Habilita la selección de 1 fila con click      
    columns: [
        { title: "ID", field: "id", hozAlign: "center", headerFilter: "input" },
        { title: "Apellido", field: "apellido", headerFilter: "input" },
        { title: "Nombre", field: "nombre", headerFilter: "input" },
        { title: "DNI", field: "dni", headerFilter: "input" },
        { title: "CUIL", field: "cuil", headerFilter: "input" },
        { title: "CUIT", field: "cuit", headerFilter: "input" },
        { title: "Teléfono", field: "num_telefono", headerFilter: "input" },
        { title: "Banco", field: "nombre_banco", headerFilter: "input" },
        { title: "Titular", field: "titular_cuenta", headerFilter: "input" },
        { title: "Cuenta N°", field: "num_cuenta_bancaria" },
        { title: "CBU", field: "cbu" }, 
        { title: "Documentación", field: "documentacion" },
    ],


});


tablaPersonas.on("rowSelected", function(row){
    let datosFila = row.getData();
    let id = datosFila.id
    let apellido = datosFila.apellido
    let nombre = datosFila.nombre
    let dni = datosFila.dni
    let cuit = datosFila.cuit
    let cuil = datosFila.cuil
    let telefono = datosFila.num_telefono
    let nombre_banco = datosFila.nombre_banco
    let titular_cuenta = datosFila.titular_cuenta
    let num_cuenta_bancaria = datosFila.num_cuenta_bancaria
    let cbu = datosFila.cbu
    let documentacion = datosFila.documentacion


    document.getElementById('edit_id').value = id;
    document.getElementById('edit_cuit').value = cuit;
    document.getElementById('edit_cuil').value = cuil;
    document.getElementById('edit_apellido').value = apellido;
    document.getElementById('edit_nombre').value = nombre;
    document.getElementById('edit_dni').value = dni;
    document.getElementById('edit_num_telefono').value = telefono;
    document.getElementById('edit_num_cuenta_bancaria').value = num_cuenta_bancaria;
    document.getElementById('edit_cbu').value = cbu;
    document.getElementById('edit_nombre_banco').value = nombre_banco;
    document.getElementById('edit_titular_cuenta').value = titular_cuenta;
    document.getElementById('edit_documentacion').value = documentacion;


    document.getElementById('eliminar_id').value = id;
    document.getElementById('eliminar_cuit').value = cuit;
    document.getElementById('eliminar_cuil').value = cuil;
    document.getElementById('eliminar_apellido').value = apellido;
    document.getElementById('eliminar_nombre').value = nombre;
    document.getElementById('eliminar_dni').value = dni;
    document.getElementById('eliminar_num_telefono').value = telefono;
    document.getElementById('eliminar_num_cuenta_bancaria').value = num_cuenta_bancaria;
    document.getElementById('eliminar_cbu').value = cbu;
    document.getElementById('eliminar_nombre_banco').value = nombre_banco;
    document.getElementById('eliminar_titular_cuenta').value = titular_cuenta;
    document.getElementById('eliminar_documentacion').value = documentacion;

});



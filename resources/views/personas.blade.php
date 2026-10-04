<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personas - Inmobiliaria</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CDN de Tabulator -->
    <link href="https://unpkg.com/tabulator-tables@5.5.0/dist/css/tabulator_bootstrap5.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="d-flex" id="wrapper">
        
        <!-- Sidebar / Barra Lateral -->
        <div class="bg-dark text-white d-flex flex-column flex-shrink-0 p-3 vh-100 position-fixed" style="width: 260px;">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="fa-solid fa-building text-primary fa-lg me-2"></i>
                <span class="fs-5 fw-bold">InmoGestión</span>
            </a>
            <hr class="text-secondary">
            <ul class="nav nav-pills flex-column mb-auto">

                <li class="nav-item mb-1">
                    <a href="{{ route('contratos') }}" class="nav-link text-secondary"><i class="fa-solid fa-file-contract me-2"></i> Contratos</a>
                </li>
                <li class="nav-item mb-1">
                    <a href="{{ route('inmuebles') }}" class="nav-link text-secondary"><i class="fa-solid fa-house me-2"></i> Inmuebles</a>
                </li>
                <li class="nav-item mb-1">
                    <!-- Personas es el link activo -->
                    <a href="{{ route('personas') }}" class="nav-link active text-white"><i class="fa-solid fa-users me-2"></i> Personas</a>
                </li>
                <li class="nav-item mb-1">
                    <a href="liquidaciones" class="nav-link text-secondary"><i class="fa-solid fa-file-invoice-dollar me-2"></i> Liquidaciones</a>
                </li>
                <li class="nav-item mb-1">
                    <a href="reparaciones" class="nav-link text-secondary"><i class="fa-solid fa-wrench me-2"></i> Reparaciones</a>
                </li>
                <li class="nav-item mb-1">
                    <a href="{{ route('notificaciones') }}" class="nav-link text-secondary d-flex justify-content-between align-items-center">
                        <span><i class="fa-regular fa-bell me-2"></i> Notificaciones</span>
                        <span class="badge bg-danger rounded-pill">3</span>
                    </a>
                </li>
            </ul>
            <hr class="text-secondary">
            <div class="d-flex align-items-center text-white">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold me-2" style="width: 35px; height: 35px;">EA</div>
                <div>
                    <h6 class="mb-0 fw-semibold">Empleado Admin</h6>
                    <small class="text-muted">Sesión Activa</small>
                </div>
            </div>
        </div>

        <!-- Contenido Principal -->
        <div class="container-fluid p-4" style="margin-left: 260px; overflow: hidden;">
            
            <!-- Cabecera de la sección -->
            <div class="d-flex justify-content-between align-items-center mb-4 pt-2">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Gestión de Personas</h2>
                    <p class="text-muted mb-0">Directorio de propietarios, inquilinos y garantes registrados.</p>
                </div>
                
                <!-- Barra de Acciones del CRUD (Botones) -->
                <div class="d-flex gap-2">
                    <button class="btn btn-primary d-flex align-items-center gap-2" id="btnNuevaPersona">
                        <i class="fa-solid fa-plus"></i> Nueva Persona
                    </button>

                    <button id="btnEditarPersona" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                        <i class="fa-solid fa-pen-to-square"></i> Editar
                    </button>
                   
                    <button id="btnEliminarPersona" class="btn btn-outline-danger d-flex align-items-center gap-2">
                        <i class="fa-solid fa-trash-can"></i> Eliminar
                    </button>
                </div>
            </div>

            <!-- Ancla donde Tabulator inyectará la tabla, pasando la ruta dinámica -->
            <div id="tabla-personas" data-url="{{ route('api.persona.datos') }}"></div>

        </div>
    </div>

    <!-- ========================================== -->
    <!-- VENTANAS MODALES (Fuera del flujo visual)  -->
    <!-- ========================================== -->

    <!-- Modal Nueva Persona -->
    <div class="modal fade" id="modalNuevaPersona" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cargar Nueva Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('personas.crud') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="accion" value="crear">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="apellido" class="form-label fw-bold">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label fw-bold">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="dni" class="form-label fw-bold">DNI</label>
                                <input type="text" class="form-control" id="dni" name="dni" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cuil" class="form-label fw-bold">CUIL</label>
                                <input type="text" class="form-control" id="cuil" name="cuil">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="cuit" class="form-label fw-bold">CUIT</label>
                                <input type="text" class="form-control" id="cuit" name="cuit">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="num_telefono" class="form-label fw-bold">Número de Teléfono</label>
                                <input type="text" class="form-control" id="num_telefono" name="num_telefono">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="num_cuenta_bancaria" class="form-label fw-bold">N° de Cuenta Bancaria</label>
                                <input type="text" class="form-control" id="num_cuenta_bancaria" name="num_cuenta_bancaria">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cbu" class="form-label fw-bold">CBU</label>
                                <input type="text" class="form-control" id="cbu" name="cbu">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nombre_banco" class="form-label fw-bold">Banco</label>
                                <input type="text" class="form-control" id="nombre_banco" name="nombre_banco">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="titular_cuenta" class="form-label fw-bold">Titular de la cuenta</label>
                                <input type="text" class="form-control" id="titular_cuenta" name="titular_cuenta">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="documentacion" class="form-label fw-bold">Link de Google Drive para Documentación</label>
                                <input type="text" class="form-control" id="documentacion" name="documentacion" placeholder="https://drive.google.com/...">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Cargar nueva persona</button>
                        </div>
                    </form>                        
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar Persona -->
    <div class="modal fade" id="modalEditarPersona" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Persona Existente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('personas.crud') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="accion" value="editar">
                        <input type="hidden" id="edit_id" name="id">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_apellido" class="form-label fw-bold">Apellido</label>
                                <input type="text" class="form-control" id="edit_apellido" name="apellido" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_nombre" class="form-label fw-bold">Nombre</label>
                                <input type="text" class="form-control" id="edit_nombre" name="nombre" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="edit_dni" class="form-label fw-bold">DNI</label>
                                <input type="text" class="form-control" id="edit_dni" name="dni" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="edit_cuil" class="form-label fw-bold">CUIL</label>
                                <input type="text" class="form-control" id="edit_cuil" name="cuil">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="edit_cuit" class="form-label fw-bold">CUIT</label>
                                <input type="text" class="form-control" id="edit_cuit" name="cuit">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_num_telefono" class="form-label fw-bold">Número de Teléfono</label>
                                <input type="text" class="form-control" id="edit_num_telefono" name="num_telefono">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_num_cuenta_bancaria" class="form-label fw-bold">N° de Cuenta Bancaria</label>
                                <input type="text" class="form-control" id="edit_num_cuenta_bancaria" name="num_cuenta_bancaria">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_cbu" class="form-label fw-bold">CBU</label>
                                <input type="text" class="form-control" id="edit_cbu" name="cbu">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_nombre_banco" class="form-label fw-bold">Banco</label>
                                <input type="text" class="form-control" id="edit_nombre_banco" name="nombre_banco">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="edit_titular_cuenta" class="form-label fw-bold">Titular de la cuenta</label>
                                <input type="text" class="form-control" id="edit_titular_cuenta" name="titular_cuenta">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="edit_documentacion" class="form-label fw-bold">Link de Google Drive para Documentación</label>
                                <input type="text" class="form-control" id="edit_documentacion" name="documentacion" placeholder="https://drive.google.com/...">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Editar Persona</button>
                        </div>
                    </form>                        
                </div>
            </div>
        </div>
    </div>


        <!-- Modal Eliminar Persona -->
    <div class="modal fade" id="modalEliminarPersona" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('personas.crud') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="hidden" id="eliminar_id" name="id">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="eliminar_apellido" class="form-label fw-bold">Apellido</label>
                                <input type="text" class="form-control" id="eliminar_apellido" name="apellido" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="eliminar_nombre" class="form-label fw-bold">Nombre</label>
                                <input type="text" class="form-control" id="eliminar_nombre" name="nombre" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="eliminar_dni" class="form-label fw-bold">DNI</label>
                                <input type="text" class="form-control" id="eliminar_dni" name="dni" disabled>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="eliminar_cuil" class="form-label fw-bold">CUIL</label>
                                <input type="text" class="form-control" id="eliminar_cuil" name="cuil" disabled>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="eliminar_cuit" class="form-label fw-bold">CUIT</label>
                                <input type="text" class="form-control" id="eliminar_cuit" name="cuit" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="eliminar_num_telefono" class="form-label fw-bold">Número de Teléfono</label>
                                <input type="text" class="form-control" id="eliminar_num_telefono" name="num_telefono" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="eliminar_num_cuenta_bancaria" class="form-label fw-bold">N° de Cuenta Bancaria</label>
                                <input type="text" class="form-control" id="eliminar_num_cuenta_bancaria" name="num_cuenta_bancaria" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="eliminar_cbu" class="form-label fw-bold">CBU</label>
                                <input type="text" class="form-control" id="eliminar_cbu" name="cbu" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="eliminar_nombre_banco" class="form-label fw-bold">Banco</label>
                                <input type="text" class="form-control" id="eliminar_nombre_banco" name="nombre_banco" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="eliminar_titular_cuenta" class="form-label fw-bold">Titular de la cuenta</label>
                                <input type="text" class="form-control" id="eliminar_titular_cuenta" name="titular_cuenta" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="eliminar_documentacion" class="form-label fw-bold">Link de Google Drive para Documentación</label>
                                <input type="text" class="form-control" id="eliminar_documentacion" name="documentacion" placeholder="https://drive.google.com/..." disabled>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-lg">Eliminar Persona</button>
                        </div>
                    </form>                        
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Tabulator y Bootstrap -->
    <script src="https://unpkg.com/tabulator-tables@5.5.0/dist/js/tabulator.min.js"></script>
    <script src="{{ asset('js/tablas_tabulator/tabla_personas.js') }}"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/personas.js') }}"></script>
</body>
</html>
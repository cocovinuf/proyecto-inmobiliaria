<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Reparaciones - Inmobiliaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/tabulator-tables@5.5.0/dist/css/tabulator_bootstrap5.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="d-flex" id="wrapper">
        
        <!-- Sidebar -->
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
                    <a href="{{ route('personas') }}" class="nav-link text-secondary"><i class="fa-solid fa-users me-2"></i> Personas</a>
                </li>
                <li class="nav-item mb-1">
                    <a href="{{ route('liquidaciones') }}" class="nav-link text-secondary"><i class="fa-solid fa-file-invoice-dollar me-2"></i> Liquidaciones</a>
                </li>
                <li class="nav-item mb-1">
                    <!-- Link Activo -->
                    <a href="{{ route('reparaciones') }}" class="nav-link active text-white"><i class="fa-solid fa-wrench me-2"></i> Reparaciones</a>
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
            
            <div class="d-flex justify-content-between align-items-center mb-4 pt-2">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Gestión de Reparaciones</h2>
                    <p class="text-muted mb-0">Control de arreglos, presupuestos y mantenimiento de propiedades.</p>
                </div>
                
                <div class="d-flex gap-2 flex-wrap">
                    <button class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="fa-solid fa-plus"></i> Nueva Reparación
                    </button>
                    <button id="btn-editar" class="btn btn-outline-secondary d-flex align-items-center gap-2" disabled>
                        <i class="fa-solid fa-pen-to-square"></i> Editar
                    </button>
                    <button id="btn-eliminar" class="btn btn-outline-danger d-flex align-items-center gap-2" disabled>
                        <i class="fa-solid fa-trash-can"></i> Eliminar
                    </button>
                </div>
            </div>

            <!-- Contenedor de la Tabla -->
            <div class="card shadow-sm border-0 w-100">
                <div class="card-body p-0">
                    <div id="tabla-reparaciones" data-url="{{ route('api.reparacion.datos') }}"></div>
                </div>
            </div>

        </div> 
    </div> 

    <!-- Scripts -->
    <script src="https://unpkg.com/tabulator-tables@5.5.0/dist/js/tabulator.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/tablas_tabulator/tabla_reparaciones.js') }}"></script> 
</body>
</html>
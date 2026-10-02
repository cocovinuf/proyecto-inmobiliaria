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
                        <!-- Opcional: un pequeño badge (globo) rojo para mostrar si hay alertas sin leer -->
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
                
                <!-- Barra de Acciones del CRUD -->
                <div class="d-flex gap-2">
                    <button class="btn btn-primary d-flex align-items-center gap-2">
                        <i class="fa-solid fa-plus"></i> Nueva Persona
                    </button>
                    <button id="btn-editar" class="btn btn-outline-secondary d-flex align-items-center gap-2" disabled>
                        <i class="fa-solid fa-pen-to-square"></i> Editar
                    </button>
                    <button id="btn-eliminar" class="btn btn-outline-danger d-flex align-items-center gap-2" disabled>
                        <i class="fa-solid fa-trash-can"></i> Eliminar
                    </button>
                </div>
            </div>

    <!-- Ancla donde Tabulator inyectará la tabla, pasando la ruta dinámica -->
    <div id="tabla-personas" data-url="{{ route('api.persona.datos') }}"></div>

    <!-- CDN de Tabulator (con el tema para Bootstrap 5 que venimos usando) -->
    <link href="https://unpkg.com/tabulator-tables@5.5.0/dist/css/tabulator_bootstrap5.min.css" rel="stylesheet">
    <script src="https://unpkg.com/tabulator-tables@5.5.0/dist/js/tabulator.min.js"></script>

    <!-- Tu script que inicializa la tabla -->
    <script src="{{ asset('js/tablas_tabulator/tabla_personas.js') }}"></script>   



        </div>
    </div>

    <!-- Script de selección de filas y habilitación de botones -->
    <script>
        const rows = document.querySelectorAll('#tabla-personas tbody tr');
        const btnEditar = document.getElementById('btn-editar');
        const btnEliminar = document.getElementById('btn-eliminar');

        rows.forEach(row => {
            row.addEventListener('click', (e) => {
                // Evita conflictos si se hace clic directamente en el botón de detalles
                if (e.target.closest('button')) return;

                rows.forEach(r => {
                    r.classList.remove('table-primary');
                });
                row.classList.add('table-primary');

                btnEditar.removeAttribute('disabled');
                btnEliminar.removeAttribute('disabled');
            });
        });
    </script>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
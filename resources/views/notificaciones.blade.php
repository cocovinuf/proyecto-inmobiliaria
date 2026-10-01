<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones - Inmobiliaria</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Pequeño ajuste para las notificaciones no leídas */
        .unread-row {
            background-color: #f8f9fa;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Contenedor Principal en Flexbox para separar Sidebar y Contenido -->
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
                    <a href="{{ route('alquileres') }}" class="nav-link text-secondary"><i class="fa-solid fa-key me-2"></i> Alquileres</a>
                </li>

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
                    <a href="{{ route('reparaciones') }}" class="nav-link text-secondary"><i class="fa-solid fa-wrench me-2"></i> Reparaciones</a>
                </li>
                <!-- Notificaciones es el link activo -->
                <li class="nav-item mb-1">
                    <a href="{{ route('notificaciones') }}" class="nav-link active text-white d-flex justify-content-between align-items-center">
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
        <div class="container-fluid p-4" style="margin-left: 260px;">
            
            <!-- Cabecera de la sección -->
            <div class="d-flex justify-content-between align-items-center mb-4 pt-2">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Notificaciones del Sistema</h2>
                    <p class="text-muted mb-0">Alertas automáticas sobre vencimientos de contratos y actualizaciones de aranceles.</p>
                </div>
                
                <!-- Barra de Acciones (Sin CRUD, solo acciones lógicas de alertas) -->
                <div class="d-flex gap-2">
                    <button id="btn-marcar-leida" class="btn btn-outline-primary d-flex align-items-center gap-2" disabled>
                        <i class="fa-solid fa-check-double"></i> Marcar como Leída
                    </button>
                </div>
            </div>



        </div>
    </div>

    <!-- Script de selección de filas y habilitación del botón "Marcar como Leída" -->
    <script>
        const rows = document.querySelectorAll('#tabla-notificaciones tbody tr');
        const btnMarcarLeida = document.getElementById('btn-marcar-leida');

        rows.forEach(row => {
            row.addEventListener('click', (e) => {
                // Evita conflictos si se hace clic directamente en el botón de ver
                if (e.target.closest('button')) return;

                rows.forEach(r => {
                    r.classList.remove('table-primary');
                });
                row.classList.add('table-primary');

                // Habilita el botón de acción
                btnMarcarLeida.removeAttribute('disabled');
            });
        });
    </script>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
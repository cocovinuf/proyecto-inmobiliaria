<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Reparaciones - Inmobiliaria</title>
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
                    <a href="{{ route('personas') }}" class="nav-link text-secondary"><i class="fa-solid fa-users me-2"></i> Personas</a>
                </li>
                <li class="nav-item mb-1">
                    <a href="{{ route('liquidaciones') }}" class="nav-link text-secondary"><i class="fa-solid fa-file-invoice-dollar me-2"></i> Liquidaciones</a>
                </li>
                <li class="nav-item mb-1">
                    <!-- Reparaciones es el link activo -->
                    <a href="{{ route('reparaciones') }}" class="nav-link active text-white"><i class="fa-solid fa-wrench me-2"></i> Reparaciones</a>
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
        <div class="container-fluid p-4" style="margin-left: 260px;">
            
            <!-- Cabecera de la sección -->
            <div class="d-flex justify-content-between align-items-center mb-4 pt-2">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Gestión de Reparaciones</h2>
                    <p class="text-muted mb-0">Registro y seguimiento del mantenimiento de inmuebles.</p>
                </div>
                
                <!-- Barra de Acciones del CRUD -->
                <div class="d-flex gap-2">
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
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="tabla-reparaciones" style="cursor: pointer;">
                            <thead class="table-light text-uppercase fs-7">
                                <tr>
                                    <th class="py-3 ps-4">ID</th>
                                    <th class="py-3">Inmueble</th>
                                    <th class="py-3">Descripción</th>
                                    <th class="py-3">Fecha</th>
                                    <th class="py-3">Costo</th>
                                    <th class="py-3">Estado</th>
                                    <th class="py-3 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-id="1">
                                    <td class="py-3 ps-4 fw-semibold">#REP-001</td>
                                    <td>Av. Centenario 4393</td>
                                    <td>Reparación de cañería baño</td>
                                    <td>12/09/2026</td>
                                    <td class="fw-medium">$ 45.000</td>
                                    <td><span class="badge bg-success">Solucionado</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-light border text-primary" title="Ver más datos">
                                            <i class="fa-solid fa-eye"></i> Detalles
                                        </button>
                                    </td>
                                </tr>
                                <tr data-id="2">
                                    <td class="py-3 ps-4 fw-semibold">#REP-002</td>
                                    <td>Calle San Martín 1250</td>
                                    <td>Cambio de cerradura principal</td>
                                    <td>28/09/2026</td>
                                    <td class="fw-medium">$ 15.000</td>
                                    <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-light border text-primary" title="Ver más datos">
                                            <i class="fa-solid fa-eye"></i> Detalles
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Script de selección de filas y habilitación de botones -->
    <script>
        const rows = document.querySelectorAll('#tabla-reparaciones tbody tr');
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
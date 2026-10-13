<form action="{{ route('contratos.crud') }}" method="POST">
    @csrf
    <input type="hidden" name="accion" value="eliminar">
    <input type="hidden" id="eliminar_id" name="id">

    <!-- Fila 1: Alias e Inmueble -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="eliminar_alias" class="form-label fw-bold">Alias del Contrato</label>
            <input type="text" class="form-control" name="alias" id="eliminar_alias" disabled>

            <label for="eliminar_inmueble_id" class="form-label fw-bold mt-3">Inmueble</label>
            <select name="inmueble_id" id="eliminar_inmueble_id" class="form-select" disabled>
                @foreach($inmuebles as $inmueble)
                    <option value="{{ $inmueble->id }}">
                        {{ $inmueble->alias }} ({{ $inmueble->tipo }} - {{ $inmueble->calle }} {{ $inmueble->numeracion }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="eliminar_estado" class="form-label fw-bold">Estado</label>
            <select name="estado" id="eliminar_estado" class="form-select" disabled>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
                <option value="rescindido">Rescindido</option>
            </select>
        </div>
    </div>

    <!-- Fila 2: Fechas -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="eliminar_fecha_inicio" class="form-label fw-bold">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="eliminar_fecha_inicio" disabled>
        </div>
        <div class="col-md-6 mb-3">
            <label for="eliminar_fecha_finalizacion" class="form-label fw-bold">Fecha de Finalización</label>
            <input type="date" class="form-control" name="fecha_finalizacion" id="eliminar_fecha_finalizacion" disabled>
        </div>
    </div>

    <!-- Fila 3: Montos -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="eliminar_monto_inicial" class="form-label fw-bold">Monto Inicial</label>
            <input type="number" step="0.01" class="form-control" name="monto_inicial" id="eliminar_monto_inicial" disabled>
        </div>
        <div class="col-md-6 mb-3">
            <label for="eliminar_monto_actual" class="form-label fw-bold">Monto Actual</label>
            <input type="number" step="0.01" class="form-control" name="monto_actual" id="eliminar_monto_actual" disabled>
        </div>
    </div>

    <!-- Fila 4: Periodo e Indice -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="eliminar_periodo_actualizacion" class="form-label fw-bold">Periodo de Actualización</label>
            <input type="text" class="form-control" name="periodo_actualizacion" id="eliminar_periodo_actualizacion" disabled>
        </div>
        <div class="col-md-6 mb-3">
            <label for="eliminar_indice_actualizacion" class="form-label fw-bold">Índice de Actualización</label>
            <input type="text" class="form-control" name="indice_actualizacion" id="eliminar_indice_actualizacion" disabled>
        </div>
    </div>

    <hr class="my-4">
    <h5 class="fw-bold mb-3 text-secondary">Inquilinos y Garantes</h5>

    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <label for="eliminar_inquilinos" class="form-label fw-bold">Inquilinos</label>
            <input type="text" class="form-control" id="eliminar_inquilinos" disabled>
        </div>
        <div class="col-md-6 mb-3">
            <label for="eliminar_garantes" class="form-label fw-bold">Garantes</label>
            <input type="text" class="form-control" id="eliminar_garantes" disabled>
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-danger btn-lg">Eliminar Contrato</button>
    </div>
</form>

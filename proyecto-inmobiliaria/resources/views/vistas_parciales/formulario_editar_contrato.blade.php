<form action="{{ route('contratos.crud') }}" method="POST">
    @csrf
    <input type="hidden" name="accion" value="editar">
    <input type="hidden" id="edit_id" name="id">

    <!-- Fila 1: Alias e Inmueble -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="edit_alias" class="form-label fw-bold">Alias del Contrato</label>
            <input type="text" class="form-control" name="alias" id="edit_alias" required>

            <label for="edit_inmueble_id" class="form-label fw-bold mt-3">Inmueble</label>
            <select name="inmueble_id" id="edit_inmueble_id" class="form-select" required>
                <option value="">Seleccione un inmueble</option>
                @foreach($inmuebles as $inmueble)
                    <option value="{{ $inmueble->id }}">
                        {{ $inmueble->alias }} ({{ $inmueble->tipo }} - {{ $inmueble->calle }} {{ $inmueble->numeracion }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="edit_estado" class="form-label fw-bold">Estado</label>
            <select name="estado" id="edit_estado" class="form-select" required>
                <option value="">Seleccione un estado</option>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
                <option value="rescindido">Rescindido</option>
            </select>
        </div>
    </div>

    <!-- Fila 2: Fechas -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="edit_fecha_inicio" class="form-label fw-bold">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="edit_fecha_inicio" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="edit_fecha_finalizacion" class="form-label fw-bold">Fecha de Finalización</label>
            <input type="date" class="form-control" name="fecha_finalizacion" id="edit_fecha_finalizacion" required>
        </div>
    </div>

    <!-- Fila 3: Montos -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="edit_monto_inicial" class="form-label fw-bold">Monto Inicial</label>
            <input type="number" step="0.01" min="0" class="form-control" name="monto_inicial" id="edit_monto_inicial" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="edit_monto_actual" class="form-label fw-bold">Monto Actual</label>
            <input type="number" step="0.01" min="0" class="form-control" name="monto_actual" id="edit_monto_actual" required>
        </div>
    </div>

    <!-- Fila 4: Periodo e Indice -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="edit_periodo_actualizacion" class="form-label fw-bold">Periodo de Actualización</label>
            <select name="periodo_actualizacion" id="edit_periodo_actualizacion" class="form-select" required>
                <option value="">Seleccione un periodo</option>
                <option value="Trimestral">Trimestral</option>
                <option value="Semestral">Semestral</option>
                <option value="Cuatrimestral">Cuatrimestral</option>
                <option value="Anual">Anual</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="edit_indice_actualizacion" class="form-label fw-bold">Índice de Actualización</label>
            <select name="indice_actualizacion" id="edit_indice_actualizacion" class="form-select" required>
                <option value="">Seleccione un índice</option>
                <option value="ICL">ICL</option>
                <option value="IPC">IPC</option>
                <option value="Casa Propia">Casa Propia</option>
                <option value="UVA">UVA</option>
            </select>
        </div>
    </div>

    <hr class="my-4">
    <h5 class="fw-bold mb-3 text-secondary">Inquilinos y Garantes</h5>

    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <label for="edit_inquilinos" class="form-label fw-bold">Inquilinos (puede elegir varios)</label>
            <select name="inquilinos[]" id="edit_inquilinos" class="form-select" multiple size="6">
                @foreach($personas as $persona)
                    <option value="{{ $persona->id }}">
                        {{ $persona->apellido }}, {{ $persona->nombre }} (DNI: {{ $persona->dni }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="edit_garantes" class="form-label fw-bold">Garantes (puede elegir varios)</label>
            <select name="garantes[]" id="edit_garantes" class="form-select" multiple size="6">
                @foreach($personas as $persona)
                    <option value="{{ $persona->id }}">
                        {{ $persona->apellido }}, {{ $persona->nombre }} (DNI: {{ $persona->dni }})
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-success btn-lg">Editar Contrato Existente</button>
    </div>
</form>

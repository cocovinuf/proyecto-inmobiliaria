<form action="{{ route('reparaciones.crud') }}" method="POST">
    @csrf
    <input type="hidden" name="accion" value="editar">
    <input type="hidden" id="edit_id" name="id">

    <!-- Fila 1: Inmueble y Descripción -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="edit_inmueble_id" class="form-label fw-bold">Inmueble</label>
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
            <label for="edit_descripcion" class="form-label fw-bold">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="edit_descripcion" required>
        </div>
    </div>

    <!-- Fila 2: Fechas -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="edit_fecha_inicio" class="form-label fw-bold">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="edit_fecha_inicio" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="edit_fecha_finalizacion" class="form-label fw-bold">Fecha de Finalización (vacía = en curso)</label>
            <input type="date" class="form-control" name="fecha_finalizacion" id="edit_fecha_finalizacion">
        </div>
    </div>

    <!-- Fila 3: Monto y Comprobante -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="edit_monto" class="form-label fw-bold">Monto</label>
            <input type="number" step="0.01" min="0" class="form-control" name="monto" id="edit_monto" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="edit_comprobante" class="form-label fw-bold">Comprobante (texto simple)</label>
            <input type="text" class="form-control" name="comprobante" id="edit_comprobante" placeholder="Ej: comprobante_01.pdf">
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-success btn-lg">Editar Reparación Existente</button>
    </div>
</form>

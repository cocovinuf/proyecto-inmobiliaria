<form action="{{ route('reparaciones.crud') }}" method="POST">
    @csrf
    <input type="hidden" name="accion" value="eliminar">
    <input type="hidden" id="eliminar_id" name="id">

    <!-- Fila 1: Inmueble y Descripción -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="eliminar_inmueble_id" class="form-label fw-bold">Inmueble</label>
            <select name="inmueble_id" id="eliminar_inmueble_id" class="form-select" disabled>
                @foreach($inmuebles as $inmueble)
                    <option value="{{ $inmueble->id }}">
                        {{ $inmueble->alias }} ({{ $inmueble->tipo }} - {{ $inmueble->calle }} {{ $inmueble->numeracion }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="eliminar_descripcion" class="form-label fw-bold">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="eliminar_descripcion" disabled>
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

    <!-- Fila 3: Monto y Comprobante -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="eliminar_monto" class="form-label fw-bold">Monto</label>
            <input type="number" step="0.01" class="form-control" name="monto" id="eliminar_monto" disabled>
        </div>
        <div class="col-md-6 mb-3">
            <label for="eliminar_comprobante" class="form-label fw-bold">Comprobante</label>
            <input type="text" class="form-control" name="comprobante" id="eliminar_comprobante" disabled>
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-danger btn-lg">Eliminar Reparación</button>
    </div>
</form>

<form action="{{ route('reparaciones.crud') }}" method="POST">
    @csrf
    <input type="hidden" name="accion" value="crear">

    <!-- Fila 1: Inmueble y Descripción -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="inmueble_id" class="form-label fw-bold">Inmueble</label>
            <select name="inmueble_id" id="inmueble_id" class="form-select" required>
                <option value="">Seleccione un inmueble</option>
                @foreach($inmuebles as $inmueble)
                    <option value="{{ $inmueble->id }}">
                        {{ $inmueble->alias }} ({{ $inmueble->tipo }} - {{ $inmueble->calle }} {{ $inmueble->numeracion }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="descripcion" class="form-label fw-bold">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ej: Filtración en techo" required>
        </div>
    </div>

    <!-- Fila 2: Fechas -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="fecha_inicio" class="form-label fw-bold">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="fecha_finalizacion" class="form-label fw-bold">Fecha de Finalización (vacía = en curso)</label>
            <input type="date" class="form-control" name="fecha_finalizacion" id="fecha_finalizacion">
        </div>
    </div>

    <!-- Fila 3: Monto y Comprobante -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="monto" class="form-label fw-bold">Monto</label>
            <input type="number" step="0.01" min="0" class="form-control" name="monto" id="monto" placeholder="Ej: 25000.00" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="comprobante" class="form-label fw-bold">Comprobante (texto simple)</label>
            <input type="text" class="form-control" name="comprobante" id="comprobante" placeholder="Ej: comprobante_01.pdf">
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-success btn-lg">Cargar nueva Reparación</button>
    </div>
</form>

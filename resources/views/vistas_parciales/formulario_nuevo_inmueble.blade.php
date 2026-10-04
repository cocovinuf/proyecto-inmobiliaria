<form action="{{ route('inmuebles.crud') }}" method="POST">
    @csrf
    <input type="hidden" name="accion" value="crear">

    <!-- Fila 1: Alias y Tipo -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="alias" class="form-label fw-bold">Alias del Inmueble</label>
            <input type="text" class="form-control" name="alias" id="alias" required>

            <label for="propietario_id" class="form-label fw-bold mt-3">Propietario</label>
            <select name="propietario_id" id="propietario_id" class="form-select" required>

                
                @foreach($personas as $persona)
                    <!-- El 'value' guarda el ID para la relación, y el texto muestra el Nombre y Apellido -->
                    <option value="{{ $persona->id }}">
                        {{ $persona->apellido }}, {{ $persona->nombre }} (DNI: {{ $persona->dni }})
                    </option>
                 @endforeach

            </select>

        </div>
        <div class="col-md-6 mb-3">
            <label for="tipo" class="form-label fw-bold">Tipo de Inmueble</label>
            <select name="tipo" id="tipo" class="form-select" required>
                <option value="">Seleccione un tipo</option>
                <option value="departamento">Departamento</option>
                <option value="casa">Casa</option>
                <option value="local">Local Comercial</option>
                <option value="galpon">Galpon</option>
                <option value="terreno">Terreno</option>
                <option value="otro">Otro</option>
            </select>
        </div>
    </div>

    <!-- Fila 2: Nombre de Edificio y Calle -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nombre_edificio" class="form-label fw-bold">Nombre del Edificio</label>
            <input type="text" class="form-control" name="nombre_edificio" id="nombre_edificio" placeholder="Nombre del Edificio (si aplica)">
        </div>
        <div class="col-md-6 mb-3">
            <label for="calle" class="form-label fw-bold">Calle</label>
            <input type="text" class="form-control" name="calle" id="calle" required>
        </div>
    </div>

    <!-- Fila 3: Numeración, Piso, Departamento, Unidad Funcional -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="numeracion" class="form-label fw-bold">Numeración</label>
            <input type="text" class="form-control" name="numeracion" id="numeracion" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="piso" class="form-label fw-bold">Piso</label>
            <input type="text" class="form-control" name="piso" id="piso">
        </div>
        <div class="col-md-3 mb-3">
            <label for="departamento" class="form-label fw-bold">Departamento</label>
            <input type="text" class="form-control" name="departamento" id="departamento">
        </div>
        <div class="col-md-3 mb-3">
            <label for="unidad_funcional" class="form-label fw-bold">Unidad Funcional</label>
            <input type="text" class="form-control" name="unidad_funcional" id="unidad_funcional" placeholder="Unidad Funcional">
        </div>
    </div>

    <!-- Fila 4: Superficie y Ambientes -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="superficie" class="form-label fw-bold">Superficie</label>
            <input type="text" class="form-control" name="superficie" id="superficie" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="cantidad_ambientes" class="form-label fw-bold">Ambientes</label>
            <input type="number" class="form-control" name="cantidad_ambientes" id="cantidad_ambientes" placeholder="Cantidad de Ambientes" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="cantidad_dormitorios" class="form-label fw-bold">Dormitorios</label>
            <input type="number" class="form-control" name="cantidad_dormitorios" id="cantidad_dormitorios" placeholder="Cantidad de Dormitorios" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="cantidad_banios" class="form-label fw-bold">Baños</label>
            <input type="number" class="form-control" name="cantidad_banios" id="cantidad_banios" placeholder="Cantidad de Baños" required>
        </div>
    </div>

    <!-- Fila 5: Cochera -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="cochera" class="form-label fw-bold">Capacidad de cochera</label>
            <input type="number" class="form-control" name="cochera" id="cochera" placeholder="Cantidad de Cocheras" required>
        </div>
    </div>

    <hr class="my-4">
    <h5 class="fw-bold mb-3 text-secondary">Comodidades / Amenities</h5>

    <!-- Sección de Comodidades (Checkboxes distribuidos en columnas) -->
    <div class="row mb-4">
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="quincho" id="quincho">
                <label class="form-check-label fw-semibold" for="quincho">Quincho</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parrilla" id="parrilla">
                <label class="form-check-label fw-semibold" for="parrilla">Parrilla</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sum" id="sum">
                <label class="form-check-label fw-semibold" for="sum">SUM</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="piscina" id="piscina">
                <label class="form-check-label fw-semibold" for="piscina">Piscina</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="gimnasio" id="gimnasio">
                <label class="form-check-label fw-semibold" for="gimnasio">Gimnasio</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="solarium" id="solarium">
                <label class="form-check-label fw-semibold" for="solarium">Solarium</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="vigilancia" id="vigilancia">
                <label class="form-check-label fw-semibold" for="vigilancia">Vigilancia</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="jardin" id="jardin">
                <label class="form-check-label fw-semibold" for="jardin">Jardín</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="lavanderia" id="lavanderia">
                <label class="form-check-label fw-semibold" for="lavanderia">Lavandería</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="terraza" id="terraza">
                <label class="form-check-label fw-semibold" for="terraza">Terraza</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cancha_de_deportes" id="cancha_de_deportes">
                <label class="form-check-label fw-semibold" for="cancha_de_deportes">Cancha de Deportes</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sauna" id="sauna">
                <label class="form-check-label fw-semibold" for="sauna">Sauna</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sala_de_reuniones" id="sala_de_reuniones">
                <label class="form-check-label fw-semibold" for="sala_de_reuniones">Sala de Reuniones</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="lockers_de_paqueteria" id="lockers_de_paqueteria">
                <label class="form-check-label fw-semibold" for="lockers_de_paqueteria">Lockers de Paquetería</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="espacio_coworking" id="espacio_coworking">
                <label class="form-check-label fw-semibold" for="espacio_coworking">Espacio de Coworking</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sala_de_juegos" id="sala_de_juegos">
                <label class="form-check-label fw-semibold" for="sala_de_juegos">Sala de Juegos</label>
            </div>
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-success btn-lg">Cargar nuevo Inmueble</button>
    </div>
</form>


<form action="{{ route('inmuebles.crud') }}" method="POST">
    @csrf 
    <input type="hidden" name="accion" value="editar">
    <input type="hidden" id="edit_id" name="id">



    <!-- Fila 1: Alias y Tipo -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="edit_alias" class="form-label fw-bold">Alias del Inmueble</label>
            <input type="text" class="form-control" name="alias" id="edit_alias" required>

            <label for="edit_propietario_id" class="form-label fw-bold mt-3">Propietario</label>
            <select name="propietario_id" id="edit_propietario_id" class="form-select" required>

                
                @foreach($personas as $persona)
                    <!-- El 'value' guarda el ID para la relación, y el texto muestra el Nombre y Apellido -->
                    <option value="{{ $persona->id }}">
                        {{ $persona->apellido }}, {{ $persona->nombre }} (DNI: {{ $persona->dni }})
                    </option>
                 @endforeach

            </select>

        </div>
        <div class="col-md-6 mb-3">
            <label for="edit_tipo" class="form-label fw-bold">Tipo de Inmueble</label>
            <select name="tipo" id="edit_tipo" class="form-select" required>
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
            <label for="edit_nombre_edificio" class="form-label fw-bold">Nombre del Edificio</label>
            <input type="text" class="form-control" name="nombre_edificio" id="edit_nombre_edificio" placeholder="Nombre del Edificio (si aplica)">
        </div>
        <div class="col-md-6 mb-3">
            <label for="edit_calle" class="form-label fw-bold">Calle</label>
            <input type="text" class="form-control" name="calle" id="edit_calle" required>
        </div>
    </div>

    <!-- Fila 3: Numeración, Piso, Departamento, Unidad Funcional -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="edit_numeracion" class="form-label fw-bold">Numeración</label>
            <input type="text" class="form-control" name="numeracion" id="edit_numeracion" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="edit_piso" class="form-label fw-bold">Piso</label>
            <input type="text" class="form-control" name="piso" id="edit_piso">
        </div>
        <div class="col-md-3 mb-3">
            <label for="edit_departamento" class="form-label fw-bold">Departamento</label>
            <input type="text" class="form-control" name="departamento" id="edit_departamento">
        </div>
        <div class="col-md-3 mb-3">
            <label for="edit_unidad_funcional" class="form-label fw-bold">Unidad Funcional</label>
            <input type="text" class="form-control" name="unidad_funcional" id="edit_unidad_funcional" placeholder="Unidad Funcional">
        </div>
    </div>

    <!-- Fila 4: Superficie y Ambientes -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="edit_superficie" class="form-label fw-bold">Superficie</label>
            <input type="text" class="form-control" name="superficie" id="edit_superficie" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="edit_cantidad_ambientes" class="form-label fw-bold">Ambientes</label>
            <input type="number" class="form-control" name="cantidad_ambientes" id="edit_cantidad_ambientes" placeholder="Cantidad de Ambientes" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="edit_cantidad_dormitorios" class="form-label fw-bold">Dormitorios</label>
            <input type="number" class="form-control" name="cantidad_dormitorios" id="edit_cantidad_dormitorios" placeholder="Cantidad de Dormitorios" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="edit_cantidad_banios" class="form-label fw-bold">Baños</label>
            <input type="number" class="form-control" name="cantidad_banios" id="edit_cantidad_banios" placeholder="Cantidad de Baños" required>
        </div>
    </div>

    <!-- Fila 5: Cochera -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="edit_cochera" class="form-label fw-bold">Capacidad de cochera</label>
            <input type="number" class="form-control" name="cochera" id="edit_cochera" placeholder="Cantidad de Cocheras" required>
        </div>
    </div>

    <hr class="my-4">
    <h5 class="fw-bold mb-3 text-secondary">Comodidades / Amenities</h5>

    <!-- Sección de Comodidades (Checkboxes distribuidos en columnas) -->
    <div class="row mb-4">
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="quincho" id="edit_quincho" value="1">
                <label class="form-check-label fw-semibold" for="edit_quincho">Quincho</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parrilla" id="edit_parrilla" value="1">
                <label class="form-check-label fw-semibold" for="edit_parrilla">Parrilla</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sum" id="edit_sum" value="1">
                <label class="form-check-label fw-semibold" for="edit_sum">SUM</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="piscina" id="edit_piscina" value="1">
                <label class="form-check-label fw-semibold" for="edit_piscina">Piscina</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="gimnasio" id="edit_gimnasio" value="1">
                <label class="form-check-label fw-semibold" for="edit_gimnasio">Gimnasio</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="solarium" id="edit_solarium" value="1">
                <label class="form-check-label fw-semibold" for="edit_solarium">Solarium</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="vigilancia" id="edit_vigilancia" value="1">
                <label class="form-check-label fw-semibold" for="edit_vigilancia">Vigilancia</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="jardin" id="edit_jardin" value="1">
                <label class="form-check-label fw-semibold" for="edit_jardin">Jardín</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="lavanderia" id="edit_lavanderia" value="1">
                <label class="form-check-label fw-semibold" for="edit_lavanderia">Lavandería</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="terraza" id="edit_terraza" value="1">
                <label class="form-check-label fw-semibold" for="edit_terraza">Terraza</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cancha_de_deportes" id="edit_cancha_de_deportes" value="1">
                <label class="form-check-label fw-semibold" for="edit_cancha_de_deportes">Cancha de Deportes</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sauna" id="edit_sauna" value="1">
                <label class="form-check-label fw-semibold" for="edit_sauna">Sauna</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sala_de_reuniones" id="edit_sala_de_reuniones" value="1">
                <label class="form-check-label fw-semibold" for="edit_sala_de_reuniones">Sala de Reuniones</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="lockers_de_paqueteria" id="edit_lockers_de_paqueteria" value="1">
                <label class="form-check-label fw-semibold" for="edit_lockers_de_paqueteria">Lockers de Paquetería</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="espacio_coworking" id="edit_espacio_coworking" value="1">
                <label class="form-check-label fw-semibold" for="edit_espacio_coworking">Espacio de Coworking</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sala_de_juegos" id="edit_sala_de_juegos" value="1">
                <label class="form-check-label fw-semibold" for="edit_sala_de_juegos">Sala de Juegos</label>
            </div>
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-success btn-lg">Editar Inmueble Existente</button>
    </div>


    
    </form>                        
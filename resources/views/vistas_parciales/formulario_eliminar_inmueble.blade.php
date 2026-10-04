<form action="{{ route('inmuebles.crud') }}" method="POST">
    @csrf 
    <input type="hidden" name="accion" value="eliminar">
    <input type="hidden" id="eliminar_id" name="id">


        <!-- Fila 1: Alias y Tipo -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="eliminar_alias" class="form-label fw-bold">Alias del Inmueble</label>
            <input type="text" class="form-control" name="alias" id="eliminar_alias" disabled>

            <label for="eliminar_propietario_id" class="form-label fw-bold mt-3">Propietario</label>
            <select name="propietario_id" id="eliminar_propietario_id" class="form-select" disabled>

                
                @foreach($personas as $persona)
                    <!-- El 'value' guarda el ID para la relación, y el texto muestra el Nombre y Apellido -->
                    <option value="{{ $persona->id }}">
                        {{ $persona->apellido }}, {{ $persona->nombre }} (DNI: {{ $persona->dni }})
                    </option>
                 @endforeach

            </select>

        </div>
        <div class="col-md-6 mb-3">
            <label for="eliminar_tipo" class="form-label fw-bold">Tipo de Inmueble</label>
            <select name="tipo" id="eliminar_tipo" class="form-select" disabled>
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
            <label for="eliminar_nombre_edificio" class="form-label fw-bold">Nombre del Edificio</label>
            <input type="text" class="form-control" name="nombre_edificio" id="eliminar_nombre_edificio" placeholder="Nombre del Edificio (si aplica)" disabled>
        </div>
        <div class="col-md-6 mb-3">
            <label for="eliminar_calle" class="form-label fw-bold">Calle</label>
            <input type="text" class="form-control" name="calle" id="eliminar_calle" disabled>
        </div>
    </div>

    <!-- Fila 3: Numeración, Piso, Departamento, Unidad Funcional -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="eliminar_numeracion" class="form-label fw-bold">Numeración</label>
            <input type="text" class="form-control" name="numeracion" id="eliminar_numeracion" disabled>
        </div>
        <div class="col-md-3 mb-3">
            <label for="eliminar_piso" class="form-label fw-bold">Piso</label>
            <input type="text" class="form-control" name="piso" id="eliminar_piso" disabled>
        </div>
        <div class="col-md-3 mb-3">
            <label for="eliminar_departamento" class="form-label fw-bold">Departamento</label>
            <input type="text" class="form-control" name="departamento" id="eliminar_departamento" placeholder="Departamento (si aplica)" disabled>
        </div>
        <div class="col-md-3 mb-3">
            <label for="eliminar_unidad_funcional" class="form-label fw-bold">Unidad Funcional</label>
            <input type="text" class="form-control" name="unidad_funcional" id="eliminar_unidad_funcional" placeholder="Unidad Funcional" disabled>
        </div>
    </div>

    <!-- Fila 4: Superficie y Ambientes -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="eliminar_superficie" class="form-label fw-bold">Superficie</label>
            <input type="text" class="form-control" name="superficie" id="eliminar_superficie" disabled>
        </div>
        <div class="col-md-3 mb-3">
            <label for="eliminar_cantidad_ambientes" class="form-label fw-bold">Ambientes</label>
            <input type="number" class="form-control" name="cantidad_ambientes" id="eliminar_cantidad_ambientes" placeholder="Cantidad de Ambientes" disabled>
        </div>
        <div class="col-md-3 mb-3">
            <label for="eliminar_cantidad_dormitorios" class="form-label fw-bold">Dormitorios</label>
            <input type="number" class="form-control" name="cantidad_dormitorios" id="eliminar_cantidad_dormitorios" placeholder="Cantidad de Dormitorios" disabled>
        </div>
        <div class="col-md-3 mb-3">
            <label for="eliminar_cantidad_banios" class="form-label fw-bold">Baños</label>
            <input type="number" class="form-control" name="cantidad_banios" id="eliminar_cantidad_banios" placeholder="Cantidad de Baños" disabled>
        </div>
    </div>

    <!-- Fila 5: Cochera -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="eliminar_cochera" class="form-label fw-bold">Capacidad de cochera</label>
            <input type="number" class="form-control" name="cochera" id="eliminar_cochera" placeholder="Cantidad de Cocheras" disabled>
        </div>
    </div>

    <hr class="my-4">
    <h5 class="fw-bold mb-3 text-secondary">Comodidades / Amenities</h5>

    <!-- Sección de Comodidades (Checkboxes distribuidos en columnas) -->
    <div class="row mb-4">
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="quincho" id="eliminar_quincho" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_quincho">Quincho</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="parrilla" id="eliminar_parrilla" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_parrilla">Parrilla</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sum" id="eliminar_sum" value="1" disabled >
                <label class="form-check-label fw-semibold" for="eliminar_sum">SUM</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="piscina" id="eliminar_piscina" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_piscina">Piscina</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="gimnasio" id="eliminar_gimnasio" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_gimnasio">Gimnasio</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="solarium" id="eliminar_solarium" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_solarium">Solarium</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="vigilancia" id="eliminar_vigilancia" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_vigilancia">Vigilancia</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="jardin" id="eliminar_jardin" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_jardin">Jardín</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="lavanderia" id="eliminar_lavanderia" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_lavanderia">Lavandería</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="terraza" id="eliminar_terraza" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_terraza">Terraza</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="cancha_de_deportes" id="eliminar_cancha_de_deportes" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_cancha_de_deportes">Cancha de Deportes</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sauna" id="eliminar_sauna" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_sauna">Sauna</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sala_de_reuniones" id="eliminar_sala_de_reuniones" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_sala_de_reuniones">Sala de Reuniones</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="lockers_de_paqueteria" id="eliminar_lockers_de_paqueteria" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_lockers_de_paqueteria">Lockers de Paquetería</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="espacio_coworking" id="eliminar_espacio_coworking" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_espacio_coworking">Espacio de Coworking</label>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sala_de_juegos" id="eliminar_sala_de_juegos" value="1" disabled>
                <label class="form-check-label fw-semibold" for="eliminar_sala_de_juegos">Sala de Juegos</label>
            </div>
        </div>
    </div>

    <!-- Botón de envío -->
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-danger btn-lg">Eliminar Inmueble</button>
    </div>




</form>                   
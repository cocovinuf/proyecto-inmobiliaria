<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido</h1>

<!-- Botón para abrir el formulario -->
<button type="button" onclick="document.getElementById('modalForm').style.display = 'flex'">
    Nuevo propietario
</button>

<!-- Modal con el formulario (Oculto inicialmente con display: none) -->
<div id="modalForm" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); align-items: center; justify-content: center; z-index: 1000;">
    <div style="background-color: white; padding: 20px; border-radius: 8px; width: 400px; max-width: 90%;">
        <h2>Agregar propietario</h2>
        
        <form action="" method="POST">
            @csrf
            
            <!-- Campos de tu formulario -->
            <div style="margin-bottom: 15px;">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" style="width: 100%; padding: 8px; margin-top: 5px;">

            </div>
            
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <!-- Botón para cerrar (ocultar) -->
                <button type="button" onclick="document.getElementById('modalForm').style.display = 'none'">
                    Cancelar
                </button>
                
                <button type="submit">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>



</body>
</html>
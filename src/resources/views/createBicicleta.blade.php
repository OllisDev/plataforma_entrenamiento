<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plataforma de entrenamiento - Crear bloque de entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('css/createBicicleta.css') }}">
    <script src="{{ asset('js/createBicicleta.js') }}"></script>
</head>

<body>
    <div class="form-createBicicleta" id="form-createBicicleta">
        <h1>Crear bicicleta</h1>
        <form>
            <div class="form">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre">
            </div>

            <div class="form">
                <label for="select-tipo">Tipo:</label>
                <select id="select-tipo"></select>
            </div>

            <div class="form">
                <label for="comentario">Comentario:</label>
                <input type="text" id="comentario">
            </div>

            <input type="button" value="Crear" id="btnCreateBicicleta" class="btnCreateBicicleta">
        </form>

        <div id="mensaje-container" class="mensaje"></div>
    </div>
</body>

</html>
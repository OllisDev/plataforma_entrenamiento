<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plataforma de entrenamiento - Crear sesion de bloque</title>
    <link rel="stylesheet" href="{{ asset('css/createSesionBloque.css') }}">
    <script src="{{ asset('js/createSesionBloque.js') }}"></script>
</head>

<body>
    <div class="form-createSesionBloque" id="form-createSesionBloque">
        <h1>Crear sesión de bloque</h1>
        <form>
            <div class="form">
                <label for="select-sesion">Sesión:</label>
                <select id="select-sesion"></select>
            </div>
            <div class="form">
                <label for="select-bloque">Bloque:</label>
                <select id="select-bloque"></select>
            </div>
            <div class="form">
                <label for="orden">Orden:</label>
                <input type="number" id="orden">
            </div>

            <div class="form">
                <label for="repeticiones">Repeticiones:</label>
                <input type="number" id="repeticiones">
            </div>

            <input type="button" value="Crear" id="btnCreateSesionBloque" class="btnCreateSesionBloque">
        </form>

        <div id="mensaje-container" class="mensaje"></div>
    </div>
</body>

</html>
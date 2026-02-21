<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plataforma de entrenamiento - Crear sesion de entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('css/createSesion.css') }}">
    <script src="{{ asset('js/createSesion.js') }}"></script>

</head>

<body>
    <div class="form-createSesion" id="form-createSesion">
        <h1>Crear sesión de entrenamiento</h1>
        <form>
            <div class="form">
                <label for="select-plan">Plan:</label>
                <select id="select-plan"></select>
            </div>
            <div class="form">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre">
            </div>

            <div class="form">
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion">
            </div>

            <div class="form form-switch">
                <label for="completada" class="switch-label">Completado:</label>
                <label class="switch">
                    <input type="checkbox" id="completada">
                    <span class="slider round"></span>
                </label>
            </div>

            <input type="button" value="Crear" id="btnCreateSesion" class="btnCreateSesion">

        </form>

        <div id="mensaje-container" class="mensaje"></div>
    </div>
</body>

</html>
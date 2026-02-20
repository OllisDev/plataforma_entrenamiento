<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Crear plan de entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('css/createPlan.css') }}">
    <script src="{{ asset('js/createPlan.js') }}" defer></script>
</head>

<body>
    <div class="form-createPlan" id="form-createPlan">
        <h1>Crear plan de entrenamiento</h1>
        <form>
            @csrf
            <div class="form">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>

            <div class="form">
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion">
            </div>

            <div class="form">
                <label for="fechaInicio">Fecha de inicio:</label>
                <input type="date" id="fechaInicio" name="fecha_inicio">
            </div>

            <div class="form">
                <label for="fechaFin">Fecha de finalización:</label>
                <input type="date" id="fechaFin" name="fecha_fin">
            </div>

            <div class="form">
                <label for="objectivo">Objetivo:</label>
                <input type="text" id="objetivo" name="objetivo">
            </div>

            <div class="form form-switch">
                <label for="activo" class="switch-label">Activo:</label>
                <label class="switch">
                    <input type="checkbox" id="activo" name="activo">
                    <span class="slider round"></span>
                </label>
            </div>

            <input type="button" value="Crear" id="btnCreatePlan" class="btnCreatePlan">

        </form>

        <div id="mensaje-container" class="mensaje"></div>
    </div>
</body>

</html>
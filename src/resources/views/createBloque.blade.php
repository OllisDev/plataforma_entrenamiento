<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plataforma de entrenamiento - Crear bloque de entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('css/createBloque.css') }}">
    <script src="{{ asset('js/createBloque.js') }}"></script>
</head>

<body>
    <div class="form-createBloque" id="form-createBloque">
        <h1>Crear bloque de entrenamiento</h1>
        <form>
            <div class="form">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre">
            </div>

            <div class="form">
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion">
            </div>

            <div class="form">
                <label for="tipo">Tipo:</label>
                <select id="select-tipo" class="type"></select>
            </div>

            <div class="form">
                <label for="duracionEstimada">Duración estimada:</label>
                <input type="time" id="duracionEstimada">
            </div>

            <div class="form">
                <label for="potenciaMinima">Potencia mínima:</label>
                <input type="number" id="potenciaMinima">
            </div>

            <div class="form">
                <label for="potenciaMaxima">Potencia máxima:</label>
                <input type="number" id="potenciaMaxima">
            </div>

            <div class="form">
                <label for="pulsoPctMax">% Pulso máximo:</label>
                <input type="number" id="pulsoPctMax" step="0.01">
            </div>

            <div class="form">
                <label for="pulsoReservaPct">% Pulso Reserva:</label>
                <input type="number" id="pulsoReservaPct" step="0.01">
            </div>

            <div class="form">
                <label for="comentario">Comentario:</label>
                <input type="text" id="comentario">
            </div>

            <input type="button" value="Crear" id="btnCreateBloque" class="btnCreateBloque">
        </form>

        <div id="mensaje-container" class="mensaje"></div>
    </div>
</body>

</html>
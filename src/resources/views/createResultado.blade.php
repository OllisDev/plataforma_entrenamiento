<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Registrar resultado</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/createResultado.css">
    <script src="js/createResultado.js"></script>
</head>

<body>
    <div class="form-createResultado" id="form-createResultado">
        <h1>Registra resultado de entrenamiento</h1>
        <form>
            <input type="hidden" id="ciclistaId" value="{{ Auth::id() }}">
            <div class="form">
                <label for="select-bicicleta">Bicicleta:</label>
                <select id="select-bicicleta"></select>
            </div>
            <div class="form">
                <label for="select-sesion">Sesion:</label>
                <select id="select-sesion"></select>
            </div>
            <div class="form">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">
            </div>
            <div class="form">
                <label for="duracion">Duración:</label>
                <input type="time" id="duracion">
            </div>
            <div class="form">
                <label for="kilometros">kilometros:</label>
                <input type="number" id="kilometros">
            </div>
            <div class="form">
                <label for="recorrido">Recorrido:</label>
                <input type="text" id="recorrido">
            </div>
            <div class="form">
                <label for="pulsoMedio">Pulso medio:</label>
                <input type="number" id="pulsoMedio">
            </div>
            <div class="form">
                <label for="pulsoMaximo">Pulso máximo:</label>
                <input type="number" id="pulsoMaximo">
            </div>
            <div class="form">
                <label for="potenciaMedia">Potencia media:</label>
                <input type="number" id="potenciaMedia">
            </div>
            <div class="form">
                <label for="potenciaNormalizada">Potencia normalizada:</label>
                <input type="number" id="potenciaNormalizada">
            </div>
            <div class="form">
                <label for="velocidadMedia">Velocidad media:</label>
                <input type="number" id="velocidadMedia">
            </div>
            <div class="form">
                <label for="puntosEstres">Puntos de estres:</label>
                <input type="number" id="puntosEstres">
            </div>
            <div class="form">
                <label for="factorIntensidad">Intensidad:</label>
                <input type="number" id="factorIntensidad">
            </div>
            <div class="form">
                <label for="ascensoMetros">Ascenso:</label>
                <input type="number" id="ascensoMetros">
            </div>
            <div class="form">
                <label for="comentario">Comentario:</label>
                <input type="text" id="comentario">
            </div>

            <br>
            <input type="button" id="btnCreateResultado" class="btnCreateResultado" value="Crear">
        </form>
        <div id="mensaje-container" class="mensaje"></div>
    </div>

</body>

</html>
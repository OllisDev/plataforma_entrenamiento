<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Crear bloque de entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('css/createBloque.css') }}">
</head>

<body>
    <div class="form-createBloque" id="form-createBloque">
        <h1>Crear bloque de entrenamiento</h1>
        <form>
            <div class="form">
                <label for="name">Nombre:</label>
                <input type="text" id="name">
            </div>

            <div class="form">
                <label for="description">Descripción:</label>
                <input type="text" id="description">
            </div>

            <div class="form">
                <label for="type">Tipo:</label>
                <select id="type" class="type">
                    <option>Rodaje</option>
                    <option>Intervalos</option>
                    <option>Fuerza</option>
                    <option>Recuperación</option>
                    <option>Test</option>
                </select>
            </div>

            <div class="form">
                <label for="duration">Duración estimada:</label>
                <input type="time" id="duration">
            </div>

            <div class="form">
                <label for="pot_min">Potencia mínima:</label>
                <input type="number" id="pot_min">
            </div>

            <div class="form">
                <label for="pot_max">Potencia máxima:</label>
                <input type="number" id="pot_max">
            </div>

            <div class="form">
                <label for="pulse">Pulso:</label>
                <input type="number" id="pulse">
            </div>

            <div class="form">
                <label for="comment">Comentario:</label>
                <input type="text" id="comment">
            </div>

            <input type="submit" value="Crear" id="btnCreateBloque" class="btnCreateBloque">

        </form>
    </div>
</body>

</html>
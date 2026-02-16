<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Crear sesion de bloque</title>
    <link rel="stylesheet" href="{{ asset('css/createSesionBloque.css') }}">
</head>

<body>
    <div class="form-createSesionBloque" id="form-createSesionBloque">
        <h1>Crear sesión de bloque</h1>
        <form>
            <div class="form">
                <label for="name">Orden:</label>
                <input type="text" id="name">
            </div>

            <div class="form">
                <label for="repetitions">Repeticiones:</label>
                <input type="number" id="repetitions">
            </div>

            <input type="submit" value="Crear" id="btnCreateSesionBloque" class="btnCreateSesionBloque">
        </form>
    </div>
</body>

</html>
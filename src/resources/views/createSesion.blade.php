<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Crear sesion de entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('css/createSesion.css') }}">

</head>

<body>
    <div class="form-createSesion" id="form-createSesion">
        <h1>Crear sesión de entrenamiento</h1>
        <form>
            <div class="form" method="POST" action="{{ route('session.listSession') }}">
                <label for="name">Nombre:</label>
                <input type="text" id="name">
            </div>

            <div class="form">
                <label for="description">Descripción:</label>
                <input type="text" id="description">
            </div>

            <div class="form form-switch">
                <label for="completed" class="switch-label">Completado:</label>
                <label class="switch">
                    <input type="checkbox" id="completed">
                    <span class="slider round"></span>
                </label>
            </div>

            <input type="submit" value="Crear" id="btnCreateSesion" class="btnCreateSesion">
        </form>
    </div>
</body>

</html>
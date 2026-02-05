<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Crear cuenta</title>
    <link rel="stylesheet" href="/css/register.css">
</head>

<body>
    <div class="register">
        <form method="POST" action="/register">
            @csrf
            <h1 class="title">Crear cuenta</h1>
            <div class="form">
                <label>Nombre: </label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form">
                <label>Apellidos: </label>
                <input type="text" id="apellidos" name="apellidos" required>
            </div>
            <div class="form">
                <label>Fecha de nacimiento: </label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" max="{{ date('Y-m-d') }}">
            </div>
            <div class="form">
                <label>Email: </label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form">
                <label>Contraseña: </label>
                <input type="password" id="password" name="password">
            </div>
            <br>
            <input type="submit" class="btnRegister" id="btnRegister" name="btnRegister" value="Crear cuenta">
        </form>
    </div>
</body>

</html>
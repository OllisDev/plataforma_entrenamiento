<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma entrenamiento - Iniciar sesión</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="login">
        <form method="POST" action="/login">
            @csrf
            <h1 class="title">Iniciar sesión</h1>
            <div class="form">
                <label>Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form">
                <label>Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <br>
            <input type="submit" class="btnLogin" id="btnLogin" name="btnLogin" value="Iniciar sesión">
        </form>
        <br>
        <p>¿No tienes cuenta?<a href="/register" class="link">Crea una cuenta</a></p>
    </div>
</body>

</html>
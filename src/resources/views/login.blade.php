<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma entrenamiento - Iniciar sesión</title>
</head>

<body>
    <div class="login">
        <form method="POST" action="/login">
            @csrf
            <h1>Iniciar sesion</h1>
            <label>Email: </label>
            <input type="email" id="email" name="email" required>
            <br>
            <br>
            <label>Contraseña: </label>
            <input type="password" id="password" name="password" required>
            <br>
            <br>
            <input type="submit" id="btnLogin" name="btnLogin" value="Iniciar sesión">
        </form>
        <br>
        <p>¿No tienes cuenta?<a href="#"> Crea una cuenta</a></p>
    </div>
</body>

</html>
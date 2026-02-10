<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Crear cuenta</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login">
        <form method="POST" action="{{ route('register') }}">
            <h1 class="title">Crear cuenta</h1>
            @csrf

            <div class="form">
                <label for="name">Nombre:</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>
            <x-input-error :messages="$errors->get('name')" class="mb-2" />

            <div class="form">
                <label for="lastName">Apellidos:</label>
                <input id="lastName" type="text" name="lastName" required>
            </div>

            <div class="form">
                <label for="birthday">Fecha de nacimiento:</label>
                <input id="birthday" type="date" name="birthday">
            </div>

            <div class="form">
                <label for="email">Correo electrónico:</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mb-2" />

            <div class="form">
                <label for="password">Contraseña:</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mb-2" />

            <div class="form">
                <label for="password_confirmation">Confirmar contraseña:</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mb-2" />

            <button type="submit" class="btnLogin">Registrarse</button>
        </form>
        <br>
        <p>¿Ya tienes una cuenta?<a href="/login" class="link">Inicia sesión</a></p>
    </div>
</body>

</html>
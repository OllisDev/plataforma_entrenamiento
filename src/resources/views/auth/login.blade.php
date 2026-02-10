<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Iniciar sesión</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            <h1 class="title">Iniciar sesión</h1>
            @csrf

            <div class="form">
                <label for="email">Email:</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mb-2" />

            <div class="form">
                <label for="password">Contraseña:</label>
                <input id="password" type="password" name="password" required>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mb-2" />

            <div class="form" style="justify-content: flex-start;">
                <label for="remember_me" style="min-width: unset;">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>Recordar contraseña</span>
                </label>
            </div>

            <button type="submit" class="btnLogin">Iniciar sesión</button>
        </form>

        <br>
        @if (Route::has('password.request'))
        <a class="forget-password" href="{{ route('password.request') }}">
            ¿Has olvidado la contraseña?
        </a>
        @endif
        <br>
        <p>¿No tienes cuenta?<a href="/register" class="link">Crea una cuenta</a></p>
    </div>
</body>

</html>
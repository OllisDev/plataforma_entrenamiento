<!DOCTYPE html>
<html>
<head>
    <title>Editar Sesión Bloque</title>
</head>
<body>

<h2>Editar Sesión Bloque</h2>

<form action="{{ route('sesionBloque.update', $sesion->id) }}" method="POST">
    @csrf

    <label>Orden:</label>
    <input type="text" name="orden" value="{{ $sesion->orden }}">

    <br><br>

    <label>Repeticiones:</label>
    <input type="text" name="repeticiones" value="{{ $sesion->repeticiones }}">

    <br><br>

    <button type="submit">Actualizar</button>
</form>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Sesión</title>
</head>
<body>

<h1>Editar Sesión de Entrenamiento</h1>

<form action="{{ route('sesion.updateSesion', $sesion->id) }}" method="POST">
    @csrf

    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="{{ $sesion->nombre }}"><br><br>

    <label>Descripción:</label><br>
    <input type="text" name="descripcion" value="{{ $sesion->descripcion }}"><br><br>

    <label>Duración:</label><br>
    <input type="text" name="duracion" value="{{ $sesion->duracion }}"><br><br>

    <button type="submit">Actualizar</button>
</form>

</body>
</html>

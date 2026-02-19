<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar Bloque</title>
</head>

<body>

    <h1>Editar Bloque de Entrenamiento</h1>

    <form action="{{ route('block.updateBlock', $bloque->id) }}" method="POST">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ $bloque->nombre }}"><br><br>

        <label>Descripción:</label><br>
        <input type="text" name="descripcion" value="{{ $bloque->descripcion }}"><br><br>

        <label>Activo:</label><br>
        <select name="activo">
            <option value="1" {{ $bloque->activo ? 'selected' : '' }}>Sí</option>
            <option value="0" {{ !$bloque->activo ? 'selected' : '' }}>No</option>
        </select><br><br>

        <button type="submit">Actualizar</button>
    </form>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan de entrenamiento - Sesiones de entrenamiento</title>
    <link rel="stylesheet" href="/css/sesion.css">
</head>

<body>
    <h1 class="title">Sesiones de entrenamiento</h1>
    <div class="table-container" id="table-sesion">
        <table class="table-style">
            <thead>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Completada</th>
                <th>Acciones</th>

            </thead>
            <tbody>
                @foreach ($sesiones as $sesion)
                    <tr>
                        <td>{{ $sesion->nombre }}</td>
                        <td>{{ $sesion->descripcion }}</td>
                        <td>{{ $sesion->completada ? 'Si' : 'No' }}</td>
                        <td>
                            <form action="{{ route('session.deleteSession', $sesion->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que deseas eliminar?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>

                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
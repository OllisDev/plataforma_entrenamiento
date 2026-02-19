<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Sesión de bloques</title>
    <link rel="stylesheet" href="/css/sesionBloque.css">
</head>

<body>
    <h1 class="title">Sesiones de bloque</h1>
    <div class="table-container" id="table-sesionBloque">
        <table class="table-style">
            <thead>
                <th>Orden</th>
                <th>Repeticiones</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($sesionesPlan as $sesionPlan)
                <tr>
                    <td>{{ $sesionPlan->orden }}</td>
                    <td>{{ $sesionPlan->repeticiones }}</td>

                    <td>
                        <a href="{{ route('sesionBloque.edit', $sesionPlan->id) }}"
                            class="btn btn-warning">
                            Editar
                        </a>

                        <form action="{{ route('sesionBloque.delete', $sesionPlan->id) }}"
                            method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit"
                                onclick="return confirm('¿Seguro que deseas eliminar?')"
                                class="btn btn-danger">
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
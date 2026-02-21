<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesiones de entrenamiento</title>
    <link rel="stylesheet" href="/css/sesion.css">
</head>
<body>
    <h1 class="title">Sesiones de entrenamiento</h1>

    <div class="table-container" id="table-sesion">
        <table class="table-style">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Completada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <!-- tbody con data-last-page para que el JS sepa cuántas páginas hay -->
            <tbody id="sesion-body" data-last-page="{{ $sesiones->lastPage() }}">
               
        @foreach ($sesiones as $sesion)
                    <tr>
                        <td>{{ $sesion->nombre }}</td>
                        <td>{{ $sesion->descripcion }}</td>
                        <td>{{ $sesion->completada ? 'Si' : 'No' }}</td>
                        <td>
                            <form action="{{ route('session.deleteSession', $sesion->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
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

    <!-- Mensaje de carga -->
    <div id="loading" style="display:none; text-align:center; margin-top:10px;">
        Cargando más sesiones...
    </div>

    <!-- JS modular de lazy load -->
    <script src="{{ asset('js/infinite-scroll.js') }}"></script>
</body>
</html>
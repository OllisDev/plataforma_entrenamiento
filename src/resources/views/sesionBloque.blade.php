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
    
    <div class="table-container" id="table-sesion-bloque">
        <table class="table-style">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Repeticiones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="sesion-bloque-body" data-last-page="{{ $sesionesBloque->lastPage() }}">
                @include('sesion_bloque_rows', ['sesionesBloque' => $sesionesBloque])
            </tbody>
        </table>
    </div>

    <div id="loading" style="display:none; text-align:center; margin-top:10px;">
        Cargando más...
    </div>

    <script src="{{ asset('js/infinite-scroll.js') }}"></script>
</body>
</html>
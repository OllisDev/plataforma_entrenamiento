<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloques de entrenamiento</title>
    <link rel="stylesheet" href="/css/bloque.css">
</head>
<body>
    <h1 class="title">Bloques de entrenamiento</h1>

    <div class="table-container" id="table-bloque">
        <table class="table-style">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Duración</th>
                    <th>Potencia mín</th>
                    <th>Potencia máx</th>
                    <th>Pulso</th>
                    <th>Comentario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="bloque-body" data-last-page="{{ $bloques->lastPage() }}">
                @include('bloque_rows', ['bloques' => $bloques])
            </tbody>
        </table>
    </div>

    <div id="loading" style="display:none; text-align:center; margin-top:10px;">
        Cargando más bloques...
    </div>

    <script src="{{ asset('js/infinite-scroll.js') }}"></script>
</body>
</html>
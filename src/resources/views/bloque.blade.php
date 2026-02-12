<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Bloques de entrenamiento</title>
    <link rel="stylesheet" href="/css/bloque.css">
</head>

<body>
    <h1 class="title">Bloques de entrenamiento</h1>
    <div class="table-container" id="table-bloque">
        <table class="table-style">
            <thead>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Duración estimada</th>
                <th>Potencia mínima</th>
                <th>Potencia máxima</th>
                <th>Pulso</th>
                <th>Comentario</th>
            </thead>
            <tbody>
                @foreach ($bloques as $bloque)
                    <tr>
                        <td>{{ $bloque->nombre }}</td>
                        <td>{{ $bloque->descripcion }}</td>
                        <td>{{ $bloque->tipo }}</td>
                        <td>{{ $bloque->duracion_estimada }}</td>
                        <td>{{ $bloque->potencia_pct_min }}</td>
                        <td>{{ $bloque->potencia_pct_max }}</td>
                        <td>{{ $bloque->pulso_reserva_pct }}</td>
                        <td>{{ $bloque->comentario }}</td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
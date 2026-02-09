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
                <tr>{{ $bloque->nombre }}</tr>
                <tr>{{ $bloque->descripcion }}</tr>
                <tr>{{ $bloque->tipo }}</tr>
                <tr>{{ $bloque->duracion_estimada }}</tr>
                <tr>{{ $bloque->potencia_pct_min }}</tr>
                <tr>{{ $bloque->potencia_pct_max }}</tr>
                <tr>{{ $bloque->pulso_reserva_pct }}</tr>
                <tr>{{ $bloque->comentario }}</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
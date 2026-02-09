<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Planes de entrenamiento</title>
    <link rel="stylesheet" href="/css/plan.css">
</head>

<body>
    <h1 class="title">Planes de entrenamiento</h1>
    <div class="table-container" id="table-plan">
        <table class="table-style">
            <thead>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Objetivo</th>
                <th>Activo</th>
            </thead>
            <tbody>
                @foreach ($planes as $plan)
                <tr>{{ $plan->nombre }}</tr>
                <tr>{{ $plan->descripcion }}</tr>
                <tr>{{ $plan->fecha_inicio }}</tr>
                <tr>{{ $plan->fecha_fin }}</tr>
                <tr>{{ $plan->objetivo }}</tr>
                <tr>{{ $plan->activo ? 'Si' : 'No'}}</tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
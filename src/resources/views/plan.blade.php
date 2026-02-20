<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plataforma de entrenamiento - Planes de entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('css/plan.css') }}">
    <script src="{{ asset('js/listPlan.js') }}"></script>
    <script src="{{ asset('js/deletePlan.js') }}"></script>
</head>

<body>
    <h1 class="title">Planes de entrenamiento</h1>
    <div class="table-container" id="table-plan">
    </div>
</body>

</html>
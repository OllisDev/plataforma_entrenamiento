<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plan de entrenamiento - Sesiones de entrenamiento</title>
    <link rel="stylesheet" href="/css/sesion.css">
    <script src="js/listSesion.js"></script>
    <script src="js/deleteSesion.js"></script>
</head>

<body>
    <h1 class="title">Sesiones de entrenamiento</h1>
    <div class="table-container" id="table-sesion"></div>
</body>

</html>
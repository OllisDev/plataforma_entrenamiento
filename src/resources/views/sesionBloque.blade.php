<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plataforma de entrenamiento - Sesión de bloques</title>
    <link rel="stylesheet" href="/css/sesionBloque.css">
    <script src="js/listSesionBloque.js"></script>
    <script src="js/deleteSesionBloque.js"></script>
</head>

<body>
    <h1 class="title">Sesiones de bloque</h1>
    <div class="table-container" id="table-sesionBloque"></div>
</body>

</html>
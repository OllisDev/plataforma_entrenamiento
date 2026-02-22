<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Plataforma de entrenamiento - Resultados de entrenamiento</title>
    <link rel="stylesheet" href="css/resultado.css">
    <script src="js/listResultado.js"></script>
    <script src="js/deleteResultado.js"></script>
</head>

<body>
    <input type="hidden" id="ciclistaId" value="{{ Auth::id() }}">
    <h1 class="title">Resultados de entrenamiento</h1>
    <div class="table-container" id="table-resultado"></div>

</body>

</html>
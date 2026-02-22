<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Página principal</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/main.css">
    <script src="/js/menus.js"></script>
</head>

<body>
    <nav id="menu-nav">
        <ul id="menu-list"></ul>
    </nav>
    <div class="card-content">
        <div id="content"></div>
    </div>
</body>

</html>
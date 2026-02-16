<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Crear plan de entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('css/createPlan.css') }}">
</head>

<body>
    <div class="form-createPlan" id="form-createPlan">
        <h1>Crear plan de entrenamiento</h1>
        <form>
            <div class="form">
                <label for="name">Nombre:</label>
                <input type="text" id="name">
            </div>

            <div class="form">
                <label for="description">Descripción:</label>
                <input type="text" id="description">
            </div>

            <div class="form">
                <label for="start">Fecha de inicio:</label>
                <input type="date" id="start">
            </div>

            <div class="form">
                <label for="end">Fecha de finalización:</label>
                <input type="date" id="end">
            </div>

            <div class="form">
                <label for="objective">Objetivo:</label>
                <input type="text" id="objective">
            </div>

            <div class="form form-switch">
                <label for="active" class="switch-label">Activo:</label>
                <label class="switch">
                    <input type="checkbox" id="active">
                    <span class="slider round"></span>
                </label>
            </div>

            <input type="submit" value="Crear" id="btnCreatePlan" class="btnCreatePlan">

        </form>
    </div>
</body>

</html>
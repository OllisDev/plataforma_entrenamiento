<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan de entrenamiento - Editar plan de entrenamiento</title>
    <link rel="stylesheet" href="/css/editPlan.css">
    <script src="/js/editPlan.js"></script>
</head>

<body>
    <div class="form-container">
        <h1>Editar plan de entrenamiento</h1>
        <form id="form" data-plan-id="{{ $plan->id }}">
            @csrf

            <div class="form">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ $plan->nombre }}">
            </div>

            <div class="form">
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" id="descripcion" value="{{ $plan->descripcion }}">
            </div>

            <div class="form">
                <label for="fecha_inicio">Fecha inicio:</label>
                <input type="date" name="fecha_inicio" id="fechaInicio"
                    value="{{ \Illuminate\Support\Carbon::parse($plan->fecha_inicio)->format('Y-m-d') }}">
            </div>

            <div class="form">
                <label>Fecha de finalización:</label>
                <input type="date" name="fecha_fin" id="fechaFin"
                    value="{{ \Illuminate\Support\Carbon::parse($plan->fecha_fin)->format('Y-m-d') }}">
            </div>

            <div class="form">
                <label for="objetivo">Objetivo:</label>
                <input type="text" name="objetivo" id="objetivo" value="{{ $plan->objetivo }}">
            </div>

            <div class="form form-switch">
                <label for="active" class="switch-label">Activo:</label>
                <label class="switch">
                    <input type="checkbox" id="activo" name="activo" required value="{{ $plan->activo }}">
                    <span class="slider round"></span>
                </label>
            </div>

            <button type="submit" id="btnActualizar" class="btnActualizar">Actualizar</button>
            <br>

            <div class="mensaje-container" id="mensaje"></div>
            <br>
            <div class="link-container">
                <a href="{{ route('main')}}" class="link">Volver a la página principal</a>
            </div>
        </form>
    </div>

</body>

</html>
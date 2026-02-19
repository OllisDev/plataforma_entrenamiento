<!DOCTYPE html>
<html>

<head>
    <title>Editar Plan</title>
</head>

<body>
    <h2>Editar Plan</h2>

    <form action="{{ route('plan.updatePlan', $plan->id) }}" method="POST">
        @csrf

        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ $plan->nombre }}">
        </div>

        <div>
            <label>Descripción</label>
            <input type="text" name="descripcion" value="{{ $plan->descripcion }}">
        </div>

        <div>
            <label>Duración</label>
            <input type="text" name="duracion" value="{{ $plan->duracion }}">
        </div>

        <button type="submit">Actualizar</button>
    </form>
</body>

</html>
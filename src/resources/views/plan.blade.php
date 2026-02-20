<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de entrenamiento - Planes de entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('css/plan.css') }}">
    <script src="{{ asset('js/listPlan.js') }}"></script>
    <script src="{{ asset('js/deletePlan.js') }}"></script>
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
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($planes as $plan)
                    <tr>
                        <td>{{ $plan->nombre }}</td>
                        <td>{{ $plan->descripcion }}</td>
                        <td>{{ $plan->fecha_inicio }}</td>
                        <td>{{ $plan->fecha_fin }}</td>
                        <td>{{ $plan->objetivo }}</td>
                        <td>{{ $plan->activo ? 'Si' : 'No'}}</td>

                        <td>
                            <a href="{{ route('plan.editPlan', $plan->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                            <br>
                            <form style="display:inline;" id="form" data-plan-id="{{ $plan->id }}">
                                @csrf
                                <input type="button" class="btn btn-danger btn-sm btnEliminar" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
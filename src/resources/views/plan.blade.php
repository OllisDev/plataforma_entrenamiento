<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Planes de entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('css/plan.css') }}">
</head>
<body>
    <h1 class="title">Planes de entrenamiento</h1>

    <div class="table-container" id="table-plan">
        <table class="table-style">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Objetivo</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="plan-body" data-last-page="{{ $planes->lastPage() }}">
                @include('plan_entrenamiento_rows', ['planes' => $planes])
            </tbody>
        </table>
    </div>

    <div id="loading" style="display:none; text-align:center; margin-top:10px;">
        Cargando más planes...
    </div>

    <script src="{{ asset('js/infinite-scroll.js') }}"></script>
    <script src="{{ asset('js/deletePlan.js') }}"></script>
</body>
</html>
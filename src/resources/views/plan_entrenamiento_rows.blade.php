@foreach ($planes as $plan)
<tr>
    <td>{{ $plan->nombre }}</td>
    <td>{{ $plan->descripcion }}</td>
    <td>{{ $plan->fecha_inicio }}</td>
    <td>{{ $plan->fecha_fin }}</td>
    <td>{{ $plan->objetivo }}</td>
    <td>{{ $plan->activo ? 'Sí' : 'No' }}</td>
    <td>
        <a href="{{ route('plan.editPlan', $plan->id) }}">Editar</a>
        <form action="{{ route('plan.deletePlan', $plan->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar?')">
                Eliminar
            </button>
        </form>
    </td>
</tr>
@endforeach
@foreach ($sesiones as $sesion)
<tr>
    <td>{{ $sesion->nombre }}</td>
    <td>{{ $sesion->descripcion }}</td>
    <td>{{ $sesion->completada ? 'Si' : 'No' }}</td>
    <td>
        <form action="{{ route('session.deleteSession', $sesion->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit"
                onclick="return confirm('¿Seguro que deseas eliminar?')">
                Eliminar
            </button>
        </form>
    </td>
</tr>
@endforeach
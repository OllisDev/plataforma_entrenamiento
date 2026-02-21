@foreach ($sesionesBloque as $sb)
<tr>
    <td>{{ $sb->orden }}</td>
    <td>{{ $sb->repeticiones }}</td>
    <td>
        <form action="{{ route('sessionPlan.deleteSessionBlock', $sb->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar?')">
                Eliminar
            </button>
        </form>
    </td>
</tr>
@endforeach
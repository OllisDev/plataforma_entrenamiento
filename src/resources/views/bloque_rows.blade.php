@foreach ($bloques as $bloque)
<tr>
    <td>{{ $bloque->nombre }}</td>
    <td>{{ $bloque->descripcion }}</td>
    <td>{{ $bloque->tipo }}</td>
    <td>{{ $bloque->duracion_estimada }}</td>
    <td>{{ $bloque->potencia_pct_min }}</td>
    <td>{{ $bloque->potencia_pct_max }}</td>
    <td>{{ $bloque->pulso_reserva_pct }}</td>
    <td>{{ $bloque->comentario }}</td>
    <td>
        <form action="{{ route('block.deleteBlock', $bloque->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar?')">
                Eliminar
            </button>
        </form>
    </td>
</tr>
@endforeach
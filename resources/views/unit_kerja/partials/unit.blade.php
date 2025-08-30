<li>
    <strong>{{ $unit->NamaUnitKerja }}</strong> 
    (Tempat: {{ $unit->TempatTugas }}, ID: {{ $unit->UnitKerjaID }})
    
    <a href="{{ route('unit_kerja.edit', $unit->UnitKerjaID) }}" class="btn btn-warning btn-sm">Edit</a>
    <form action="{{ route('unit_kerja.destroy', $unit->UnitKerjaID) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
    </form>

    @if($unit->children->count() > 0)
        <ul>
            @foreach($unit->children as $child)
                @include('unit_kerja.partials.unit', ['unit' => $child])
            @endforeach
        </ul>
    @endif
</li>

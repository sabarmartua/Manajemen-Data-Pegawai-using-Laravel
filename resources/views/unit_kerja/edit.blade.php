@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Unit Kerja</h2>

    <form action="{{ route('unit_kerja.update', $unitKerja->UnitKerjaID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="NamaUnitKerja" class="form-label">Nama Unit Kerja</label>
            <input type="text" name="NamaUnitKerja" id="NamaUnitKerja" class="form-control" value="{{ $unitKerja->NamaUnitKerja }}" required>
        </div>

        <div class="mb-3">
            <label for="TempatTugas" class="form-label">Tempat Tugas</label>
            <input type="text" name="TempatTugas" id="TempatTugas" class="form-control" value="{{ $unitKerja->TempatTugas }}" required>
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Unit (Opsional)</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">-- Tidak ada parent --</option>
                @foreach($parents as $parent)
                    <option value="{{ $parent->UnitKerjaID }}" {{ $unitKerja->parent_id == $parent->UnitKerjaID ? 'selected' : '' }}>
                        {{ $parent->NamaUnitKerja }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('unit_kerja.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

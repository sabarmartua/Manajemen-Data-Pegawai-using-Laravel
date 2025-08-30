@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Unit Kerja</h2>

    <form action="{{ route('unit_kerja.store') }}" method="POST">
        @csrf

        {{-- Nama Unit Kerja --}}
        <div class="mb-3">
            <label for="nama_unit_kerja" class="form-label">Nama Unit Kerja</label>
            <input type="text" name="NamaUnitKerja" id="nama_unit_kerja" class="form-control" required>
        </div>

        {{-- Tempat Tugas --}}
        <div class="mb-3">
            <label for="tempat_tugas" class="form-label">Tempat Tugas</label>
            <input type="text" name="TempatTugas" id="tempat_tugas" class="form-control" required>
        </div>

        {{-- Parent Unit --}}
        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Unit (opsional)</label>
            <select name="parent_id" id="parent_id" class="form-select">
                <option value="">-- Pilih Parent --</option>
                @foreach($parents as $parent)
                    <option value="{{ $parent->UnitKerjaID }}">{{ $parent->NamaUnitKerja }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('unit_kerja.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

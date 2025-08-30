@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Agama</h2>
    <form action="{{ route('agama.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Agama</label>
            <input type="text" name="NamaAgama" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Simpan</button>
        <a href="{{ route('agama.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Golongan</h2>
    <form action="{{ route('golongan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Golongan</label>
            <input type="text" name="NamaGolongan" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Simpan</button>
        <a href="{{ route('golongan.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection

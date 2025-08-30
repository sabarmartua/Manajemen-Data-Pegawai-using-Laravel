@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Jabatan</h2>
    <form action="{{ route('jabatan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Jabatan</label>
            <input type="text" name="NamaJabatan" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Simpan</button>
        <a href="{{ route('jabatan.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Jabatan</h2>
    <form action="{{ route('jabatan.update', $jabatan->JabatanID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Jabatan</label>
            <input type="text" name="NamaJabatan" class="form-control" value="{{ $jabatan->NamaJabatan }}" required>
        </div>
        <button class="btn btn-success mt-2">Update</button>
        <a href="{{ route('jabatan.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection

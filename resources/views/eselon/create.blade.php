@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Eselon</h2>
    <form action="{{ route('eselon.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Eselon</label>
            <input type="text" name="NamaEselon" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Simpan</button>
        <a href="{{ route('eselon.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection

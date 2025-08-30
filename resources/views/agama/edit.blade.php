@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Agama</h2>
    <form action="{{ route('agama.update', $agama->AgamaID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Agama</label>
            <input type="text" name="NamaAgama" class="form-control" value="{{ $agama->NamaAgama }}" required>
        </div>
        <button class="btn btn-success mt-2">Update</button>
        <a href="{{ route('agama.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Golongan</h2>
    <form action="{{ route('golongan.update', $golongan->GolID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Golongan</label>
            <input type="text" name="NamaGolongan" class="form-control" value="{{ $golongan->NamaGolongan }}" required>
        </div>
        <button class="btn btn-success mt-2">Update</button>
        <a href="{{ route('golongan.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection

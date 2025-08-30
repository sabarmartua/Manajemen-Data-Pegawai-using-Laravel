@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Eselon</h2>
    <form action="{{ route('eselon.update', $eselon->EselonID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Eselon</label>
            <input type="text" name="NamaEselon" class="form-control" value="{{ $eselon->NamaEselon }}" required>
        </div>
        <button class="btn btn-success mt-2">Update</button>
        <a href="{{ route('eselon.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection

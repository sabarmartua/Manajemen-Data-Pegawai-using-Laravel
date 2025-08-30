@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Unit Kerja (Hirarki)</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('unit_kerja.create') }}" class="btn btn-primary mb-3">+ Tambah Unit Kerja</a>

    <ul>
        @foreach($unitKerjas as $uk)
            @include('unit_kerja.partials.unit', ['unit' => $uk])
        @endforeach
    </ul>
</div>
@endsection

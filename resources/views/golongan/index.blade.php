@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Golongan</h2>
    <a href="{{ route('golongan.create') }}" class="btn btn-primary mb-3">Tambah Golongan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama Golongan</th>
            <th>Aksi</th>
        </tr>
        @foreach($golongans as $golongan)
        <tr>
            <td>{{ $golongan->GolID }}</td>
            <td>{{ $golongan->NamaGolongan }}</td>
            <td>
                <a href="{{ route('golongan.edit', $golongan->GolID) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('golongan.destroy', $golongan->GolID) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

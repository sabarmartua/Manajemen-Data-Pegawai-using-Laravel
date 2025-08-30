@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Agama</h2>
    <a href="{{ route('agama.create') }}" class="btn btn-primary mb-3">Tambah Agama</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama Agama</th>
            <th>Aksi</th>
        </tr>
        @foreach($agamas as $agama)
        <tr>
            <td>{{ $agama->AgamaID }}</td>
            <td>{{ $agama->NamaAgama }}</td>
            <td>
                <a href="{{ route('agama.edit', $agama->AgamaID) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('agama.destroy', $agama->AgamaID) }}" method="POST" class="d-inline">
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

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Jabatan</h2>
    <a href="{{ route('jabatan.create') }}" class="btn btn-primary mb-3">Tambah Jabatan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama Jabatan</th>
            <th>Aksi</th>
        </tr>
        @foreach($jabatans as $jabatan)
        <tr>
            <td>{{ $jabatan->JabatanID }}</td>
            <td>{{ $jabatan->NamaJabatan }}</td>
            <td>
                <a href="{{ route('jabatan.edit', $jabatan->JabatanID) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('jabatan.destroy', $jabatan->JabatanID) }}" method="POST" class="d-inline">
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

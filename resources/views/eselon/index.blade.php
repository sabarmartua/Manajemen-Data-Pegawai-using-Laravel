@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Eselon</h2>
    <a href="{{ route('eselon.create') }}" class="btn btn-primary mb-3">Tambah Eselon</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama Eselon</th>
            <th>Aksi</th>
        </tr>
        @foreach($eselons as $eselon)
        <tr>
            <td>{{ $eselon->EselonID }}</td>
            <td>{{ $eselon->NamaEselon }}</td>
            <td>
                <a href="{{ route('eselon.edit', $eselon->EselonID) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('eselon.destroy', $eselon->EselonID) }}" method="POST" class="d-inline">
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

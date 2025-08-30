@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Pegawai</h2>

    {{-- Tombol tambah & export --}}
    <div class="mb-3">
        <a href="{{ route('pegawai.create') }}" class="btn btn-primary">+ Tambah Pegawai</a>
        <a href="{{ route('pegawai.export.csv') }}" class="btn btn-success">Export CSV</a>
    </div>

    {{-- Form pencarian --}}
    <form action="{{ route('pegawai.index') }}" method="GET" class="mb-3 d-flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari NIP atau Nama" class="form-control">
        <select name="unit_kerja_id" class="form-select">
            <option value="">-- Semua Unit Kerja --</option>
            @foreach($unitKerjas as $uk)
            <option value="{{ $uk->UnitKerjaID }}" {{ request('unit_kerja_id') == $uk->UnitKerjaID ? 'selected' : '' }}>
                {{ $uk->NamaUnitKerja }}
            </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-secondary">Filter</button>
    </form>

    {{-- Alert --}}
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel --}}
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Agama</th>
                <th>Jabatan</th>
                <th>Unit Kerja</th>
                <th>Golongan</th>
                <th>Eselon</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pegawais as $p)
            <tr>
                <td>{{ $p->NIP }}</td>
                <td>{{ $p->Nama }}</td>
                <td>{{ $p->agama->NamaAgama ?? '-' }}</td>
                <td>{{ $p->jabatan->NamaJabatan ?? '-' }}</td>
                <td>{{ $p->unitKerja->NamaUnitKerja ?? '-' }}</td>
                <td>{{ $p->golongan->NamaGolongan ?? '-' }}</td>
                <td>{{ $p->eselon->NamaEselon ?? '-' }}</td>
                <td>
                    <a href="{{ route('pegawai.edit', $p->NIP) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pegawai.destroy', $p->NIP) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus pegawai ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
                <td>
                    @if($p->Foto)
                        <img src="{{ asset('storage/'.$p->Foto) }}" alt="Foto {{ $p->Nama }}" width="100" class="img-thumbnail">
                    @else
                    <span>-</span>
                    @endif
                </td>

            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Belum ada data pegawai</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div>
        {{ $pegawais->withQueryString()->links() }}
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pegawai</h2>

    <form action="{{ route('pegawai.update', $pegawai->NIP) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="NIP" class="form-label">NIP</label>
            <input type="text" name="NIP" id="NIP" class="form-control" value="{{ $pegawai->NIP }}" readonly>
        </div>

        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" name="Nama" id="Nama" class="form-control" value="{{ $pegawai->Nama }}" required>
        </div>

        <div class="mb-3">
            <label for="TempatLahir" class="form-label">Tempat Lahir</label>
            <input type="text" name="TempatLahir" id="TempatLahir" class="form-control" value="{{ $pegawai->TempatLahir }}" required>
        </div>

        <div class="mb-3">
            <label for="TglLahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="TglLahir" id="TglLahir" class="form-control" value="{{ $pegawai->TglLahir->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="JenisKelamin" class="form-select" required>
                <option value="L" {{ $pegawai->JenisKelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ $pegawai->JenisKelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <textarea name="Alamat" id="Alamat" class="form-control" rows="3" required>{{ $pegawai->Alamat }}</textarea>
        </div>

        {{-- Dropdown Agama, Jabatan, Unit Kerja, Golongan, Eselon --}}
        <div class="mb-3">
            <label for="AgamaID" class="form-label">Agama</label>
            <select name="AgamaID" id="AgamaID" class="form-select" required>
                @foreach($agamas as $a)
                    <option value="{{ $a->AgamaID }}" {{ $pegawai->AgamaID == $a->AgamaID ? 'selected' : '' }}>
                        {{ $a->NamaAgama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="JabatanID" class="form-label">Jabatan</label>
            <select name="JabatanID" id="JabatanID" class="form-select" required>
                @foreach($jabatans as $j)
                    <option value="{{ $j->JabatanID }}" {{ $pegawai->JabatanID == $j->JabatanID ? 'selected' : '' }}>
                        {{ $j->NamaJabatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="UnitKerjaID" class="form-label">Unit Kerja</label>
            <select name="UnitKerjaID" id="UnitKerjaID" class="form-select" required>
                @foreach($unitKerjas as $uk)
                    <option value="{{ $uk->UnitKerjaID }}" {{ $pegawai->UnitKerjaID == $uk->UnitKerjaID ? 'selected' : '' }}>
                        {{ $uk->NamaUnitKerja }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="GolID" class="form-label">Golongan</label>
            <select name="GolID" id="GolID" class="form-select">
                @foreach($golongans as $g)
                    <option value="{{ $g->GolID }}" {{ $pegawai->GolID == $g->GolID ? 'selected' : '' }}>
                        {{ $g->NamaGolongan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="EselonID" class="form-label">Eselon</label>
            <select name="EselonID" id="EselonID" class="form-select">
                @foreach($eselons as $e)
                    <option value="{{ $e->EselonID }}" {{ $pegawai->EselonID == $e->EselonID ? 'selected' : '' }}>
                        {{ $e->NamaEselon }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="NoHP" class="form-label">No HP</label>
            <input type="text" name="NoHP" id="NoHP" class="form-control" value="{{ $pegawai->NoHP }}">
        </div>

        <div class="mb-3">
            <label for="NPWP" class="form-label">NPWP</label>
            <input type="text" name="NPWP" id="NPWP" class="form-control" value="{{ $pegawai->NPWP }}">
        </div>

        <div class="mb-3">
            <label for="Foto" class="form-label">Foto</label>
            @if($pegawai->Foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$pegawai->Foto) }}" alt="Foto Pegawai" width="120">
                </div>
            @endif
            <input type="file" name="Foto" id="Foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pegawai</h2>

    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="NIP" class="form-label">NIP</label>
            <input type="text" name="NIP" id="NIP" class="form-control" value="{{ old('NIP') }}" required>
        </div>

        <div class="mb-3">
            <label for="Nama" class="form-label">Nama</label>
            <input type="text" name="Nama" id="Nama" class="form-control" value="{{ old('Nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="TempatLahir" class="form-label">Tempat Lahir</label>
            <input type="text" name="TempatLahir" id="TempatLahir" class="form-control" value="{{ old('TempatLahir') }}" required>
        </div>

        <div class="mb-3">
            <label for="TglLahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="TglLahir" id="TglLahir" class="form-control" value="{{ old('TglLahir') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="JenisKelamin" class="form-select" required>
                <option value="L" {{ old('JenisKelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('JenisKelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <textarea name="Alamat" id="Alamat" class="form-control" rows="3" required>{{ old('Alamat') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="AgamaID" class="form-label">Agama</label>
            <select name="AgamaID" id="AgamaID" class="form-select" required>
                <option value="">-- Pilih Agama --</option>
                @foreach($agamas as $a)
                    <option value="{{ $a->AgamaID }}" {{ old('AgamaID') == $a->AgamaID ? 'selected' : '' }}>{{ $a->NamaAgama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="JabatanID" class="form-label">Jabatan</label>
            <select name="JabatanID" id="JabatanID" class="form-select" required>
                <option value="">-- Pilih Jabatan --</option>
                @foreach($jabatans as $j)
                    <option value="{{ $j->JabatanID }}" {{ old('JabatanID') == $j->JabatanID ? 'selected' : '' }}>{{ $j->NamaJabatan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="UnitKerjaID" class="form-label">Unit Kerja</label>
            <select name="UnitKerjaID" id="UnitKerjaID" class="form-select" required>
                <option value="">-- Pilih Unit Kerja --</option>
                @foreach($unitKerjas as $uk)
                    <option value="{{ $uk->UnitKerjaID }}" {{ old('UnitKerjaID') == $uk->UnitKerjaID ? 'selected' : '' }}>{{ $uk->NamaUnitKerja }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="GolID" class="form-label">Golongan</label>
            <select name="GolID" id="GolID" class="form-select">
                <option value="">-- Pilih Golongan --</option>
                @foreach($golongans as $g)
                    <option value="{{ $g->GolID }}" {{ old('GolID') == $g->GolID ? 'selected' : '' }}>{{ $g->NamaGolongan }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="EselonID" class="form-label">Eselon</label>
            <select name="EselonID" id="EselonID" class="form-select">
                <option value="">-- Pilih Eselon --</option>
                @foreach($eselons as $e)
                    <option value="{{ $e->EselonID }}" {{ old('EselonID') == $e->EselonID ? 'selected' : '' }}>{{ $e->NamaEselon }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="NoHP" class="form-label">No HP</label>
            <input type="text" name="NoHP" id="NoHP" class="form-control" value="{{ old('NoHP') }}">
        </div>

        <div class="mb-3">
            <label for="NPWP" class="form-label">NPWP</label>
            <input type="text" name="NPWP" id="NPWP" class="form-control" value="{{ old('NPWP') }}">
        </div>

        <div class="mb-3">
            <label for="Foto" class="form-label">Foto</label>
            <input type="file" name="Foto" id="Foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

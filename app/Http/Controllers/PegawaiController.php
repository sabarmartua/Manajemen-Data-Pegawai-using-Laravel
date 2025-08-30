<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Agama;
use App\Models\Jabatan;
use App\Models\UnitKerja;
use App\Models\Golongan;
use App\Models\Eselon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $query = Pegawai::query()->with(['agama','jabatan','unitKerja','golongan','eselon']);

        if ($request->filled('search')) {
            $query->where('Nama', 'like', '%'.$request->search.'%')
                  ->orWhere('NIP', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('unit_kerja_id')) {
            $query->where('UnitKerjaID', $request->unit_kerja_id);
        }

        $pegawais = $query->paginate(10);

        $unitKerjas = UnitKerja::all();

        return view('pegawai.index', compact('pegawais', 'unitKerjas'));
    }

    
    public function create()
    {
        $agamas = Agama::all();
        $jabatans = Jabatan::all();
        $unitKerjas = UnitKerja::all();
        $golongans = Golongan::all();
        $eselons = Eselon::all();

        return view('pegawai.create', compact('agamas','jabatans','unitKerjas','golongans','eselons'));
    }

    // Simpan pegawai baru
    public function store(Request $request)
    {
        $request->validate([
            'NIP' => 'required|string|unique:pegawai,NIP',
            'Nama' => 'required|string|max:100',
            'TempatLahir' => 'required|string|max:50',
            'TglLahir' => 'required|date',
            'JenisKelamin' => 'required|in:L,P',
            'Alamat' => 'required|string',
            'AgamaID' => 'required|exists:agama,AgamaID',
            'NoHP' => 'nullable|string|max:20',
            'NPWP' => 'nullable|string|max:50',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'JabatanID' => 'required|exists:jabatan,JabatanID',
            'UnitKerjaID' => 'required|exists:unit_kerja,UnitKerjaID',
            'GolID' => 'nullable|exists:golongan,GolID',
            'EselonID' => 'nullable|exists:eselon,EselonID',
        ]);

        $data = $request->all();

        if ($request->hasFile('Foto')) {
            $data['Foto'] = $request->file('Foto')->store('pegawai','public');
        }

        Pegawai::create($data);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    // Form edit pegawai
    public function edit($nip)
    {
        $pegawai = Pegawai::findOrFail($nip);
        $agamas = Agama::all();
        $jabatans = Jabatan::all();
        $unitKerjas = UnitKerja::all();
        $golongans = Golongan::all();
        $eselons = Eselon::all();

        return view('pegawai.edit', compact('pegawai','agamas','jabatans','unitKerjas','golongans','eselons'));
    }

    // Update pegawai
    public function update(Request $request, $nip)
    {
        $pegawai = Pegawai::findOrFail($nip);

        $request->validate([
            'Nama' => 'required|string|max:100',
            'TempatLahir' => 'required|string|max:50',
            'TglLahir' => 'required|date',
            'JenisKelamin' => 'required|in:L,P',
            'Alamat' => 'required|string',
            'AgamaID' => 'required|exists:agama,AgamaID',
            'NoHP' => 'nullable|string|max:20',
            'NPWP' => 'nullable|string|max:50',
            'Foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'JabatanID' => 'required|exists:jabatan,JabatanID',
            'UnitKerjaID' => 'required|exists:unit_kerja,UnitKerjaID',
            'GolID' => 'nullable|exists:golongan,GolID',
            'EselonID' => 'nullable|exists:eselon,EselonID',
        ]);

        $data = $request->all();

        if ($request->hasFile('Foto')) {
            // Hapus foto lama jika ada
            if ($pegawai->Foto && Storage::disk('public')->exists($pegawai->Foto)) {
                Storage::disk('public')->delete($pegawai->Foto);
            }
            $data['Foto'] = $request->file('Foto')->store('pegawai','public');
        }

        $pegawai->update($data);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diupdate.');
    }

    // Hapus pegawai
    public function destroy($nip)
    {
        $pegawai = Pegawai::findOrFail($nip);

        // Hapus foto jika ada
        if ($pegawai->Foto && Storage::disk('public')->exists($pegawai->Foto)) {
            Storage::disk('public')->delete($pegawai->Foto);
        }

        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }

    // Cetak daftar pegawai (CSV)
    public function exportCsv()
    {
        $pegawais = Pegawai::with(['agama','jabatan','unitKerja','golongan','eselon'])->get();

        $filename = "pegawai_".date('Ymd_His').".csv";
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $columns = ['NIP','Nama','TempatLahir','TglLahir','JenisKelamin','Alamat','Agama','NoHP','NPWP','Jabatan','UnitKerja','Golongan','Eselon'];

        $callback = function() use ($pegawais, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($pegawais as $pegawai) {
                fputcsv($file, [
                    $pegawai->NIP,
                    $pegawai->Nama,
                    $pegawai->TempatLahir,
                    $pegawai->TglLahir,
                    $pegawai->JenisKelamin,
                    $pegawai->Alamat,
                    $pegawai->agama ? $pegawai->agama->NamaAgama : '',
                    $pegawai->NoHP,
                    $pegawai->NPWP,
                    $pegawai->jabatan ? $pegawai->jabatan->NamaJabatan : '',
                    $pegawai->unitKerja ? $pegawai->unitKerja->NamaUnitKerja : '',
                    $pegawai->golongan ? $pegawai->golongan->NamaGolongan : '',
                    $pegawai->eselon ? $pegawai->eselon->NamaEselon : '',
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}

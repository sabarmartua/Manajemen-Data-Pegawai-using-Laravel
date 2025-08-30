<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    // Tampilkan daftar unit kerja dalam bentuk tree
    public function index()
    {
        /// Ambil semua root unit kerja beserta anak-anaknya
        $unitKerjas = UnitKerja::with('children')->whereNull('parent_id')->get();
        return view('unit_kerja.index', compact('unitKerjas'));
    }

    // Form tambah unit kerja
    public function create()
    {
        // Ambil semua unit kerja untuk pilihan parent
        $parents = UnitKerja::all();
        return view('unit_kerja.create', compact('parents'));
    }

    // Simpan unit kerja baru
    public function store(Request $request)
    {
        $request->validate([
            'NamaUnitKerja' => 'required|string|max:100',
            'TempatTugas' => 'required|string|max:100',
            'parent_id' => 'nullable|exists:unit_kerja,UnitKerjaID',
        ]);

        UnitKerja::create($request->all());

        return redirect()->route('unit_kerja.index')->with('success', 'Unit Kerja berhasil ditambahkan.');
    }

    // Form edit unit kerja
    public function edit($id)
    {
        $unitKerja = UnitKerja::findOrFail($id);
        $parents = UnitKerja::where('UnitKerjaID', '!=', $id)->get(); // agar tidak memilih diri sendiri sebagai parent
        return view('unit_kerja.edit', compact('unitKerja', 'parents'));
    }

    // Update unit kerja
    public function update(Request $request, $id)
    {
        $unitKerja = UnitKerja::findOrFail($id);

        $request->validate([
            'NamaUnitKerja' => 'required|string|max:100',
            'TempatTugas' => 'required|string|max:100',
            'parent_id' => 'nullable|exists:unit_kerja,UnitKerjaID',
        ]);

        $unitKerja->update($request->all());

        return redirect()->route('unit_kerja.index')->with('success', 'Unit Kerja berhasil diupdate.');
    }

    // Hapus unit kerja
    public function destroy($id)
    {
        $unitKerja = UnitKerja::findOrFail($id);

        // Hapus anak-anaknya atau set parent_id null
        foreach ($unitKerja->children as $child) {
            $child->update(['parent_id' => null]);
        }

        $unitKerja->delete();

        return redirect()->route('unit_kerja.index')->with('success', 'Unit Kerja berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    // Tampilkan daftar golongan
    public function index()
    {
        $golongans = Golongan::all();
        return view('golongan.index', compact('golongans'));
    }

    // Form tambah golongan
    public function create()
    {
        return view('golongan.create');
    }

    // Simpan golongan baru
    public function store(Request $request)
    {
        $request->validate([
            'NamaGolongan' => 'required|string|max:50',
        ]);

        Golongan::create($request->all());

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil ditambahkan.');
    }

    // Form edit golongan
    public function edit($id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('golongan.edit', compact('golongan'));
    }

    // Update golongan
    public function update(Request $request, $id)
    {
        $golongan = Golongan::findOrFail($id);

        $request->validate([
            'NamaGolongan' => 'required|string|max:50',
        ]);

        $golongan->update($request->all());

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil diupdate.');
    }

    // Hapus golongan
    public function destroy($id)
    {
        $golongan = Golongan::findOrFail($id);
        $golongan->delete();

        return redirect()->route('golongan.index')->with('success', 'Golongan berhasil dihapus.');
    }
}

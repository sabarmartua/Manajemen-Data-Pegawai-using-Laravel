<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    // Tampilkan daftar agama
    public function index()
    {
        $agamas = Agama::all();
        return view('agama.index', compact('agamas'));
    }

    // Form tambah agama
    public function create()
    {
        return view('agama.create');
    }

    // Simpan agama baru
    public function store(Request $request)
    {
        $request->validate([
            'NamaAgama' => 'required|string|max:50',
        ]);

        Agama::create($request->all());

        return redirect()->route('agama.index')->with('success', 'Agama berhasil ditambahkan.');
    }

    // Form edit agama
    public function edit($id)
    {
        $agama = Agama::findOrFail($id);
        return view('agama.edit', compact('agama'));
    }

    // Update agama
    public function update(Request $request, $id)
    {
        $agama = Agama::findOrFail($id);

        $request->validate([
            'NamaAgama' => 'required|string|max:50',
        ]);

        $agama->update($request->all());

        return redirect()->route('agama.index')->with('success', 'Agama berhasil diupdate.');
    }

    // Hapus agama
    public function destroy($id)
    {
        $agama = Agama::findOrFail($id);
        $agama->delete();

        return redirect()->route('agama.index')->with('success', 'Agama berhasil dihapus.');
    }
}

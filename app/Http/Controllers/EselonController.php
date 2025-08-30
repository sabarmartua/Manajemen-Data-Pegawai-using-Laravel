<?php

namespace App\Http\Controllers;

use App\Models\Eselon;
use Illuminate\Http\Request;

class EselonController extends Controller
{
    // Tampilkan daftar eselon
    public function index()
    {
        $eselons = Eselon::all();
        return view('eselon.index', compact('eselons'));
    }

    // Form tambah eselon
    public function create()
    {
        return view('eselon.create');
    }

    // Simpan eselon baru
    public function store(Request $request)
    {
        $request->validate([
            'NamaEselon' => 'required|string|max:50',
        ]);

        Eselon::create($request->all());

        return redirect()->route('eselon.index')->with('success', 'Eselon berhasil ditambahkan.');
    }

    // Form edit eselon
    public function edit($id)
    {
        $eselon = Eselon::findOrFail($id);
        return view('eselon.edit', compact('eselon'));
    }

    // Update eselon
    public function update(Request $request, $id)
    {
        $eselon = Eselon::findOrFail($id);

        $request->validate([
            'NamaEselon' => 'required|string|max:50',
        ]);

        $eselon->update($request->all());

        return redirect()->route('eselon.index')->with('success', 'Eselon berhasil diupdate.');
    }

    // Hapus eselon
    public function destroy($id)
    {
        $eselon = Eselon::findOrFail($id);
        $eselon->delete();

        return redirect()->route('eselon.index')->with('success', 'Eselon berhasil dihapus.');
    }
}

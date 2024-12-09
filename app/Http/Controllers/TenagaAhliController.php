<?php

namespace App\Http\Controllers;

use App\Models\TenagaAhli;
use Illuminate\Http\Request;

class TenagaAhliController extends Controller {
    public function index() {
        $tenagaAhli = TenagaAhli::all();
        return view('tenaga_ahli.index', compact('tenagaAhli'));
    }

    public function create() {
        return view('tenaga_ahli.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_tenagaahli' => 'required|string|max:255',
            'asal_instansi' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'kegiatan' => 'required|string|max:255',
        ]);

        TenagaAhli::create($validated);

        return redirect()->route('tenaga_ahli.index')->with('success', 'Tenaga Ahli created successfully.');
    }

    public function show($id_tenagaahli) {
        $tenagaAhli = TenagaAhli::findOrFail($id_tenagaahli);
        return view('tenaga_ahli.show', compact('tenagaAhli'));
    }

    public function edit($id_tenagaahli) {
        $tenagaAhli = TenagaAhli::findOrFail($id_tenagaahli);
        return view('tenaga_ahli.edit', compact('tenagaAhli'));
    }

    public function update(Request $request, $id_tenagaahli) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_tenagaahli' => 'required|string|max:255',
            'asal_instansi' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'kegiatan' => 'required|string|max:255',
        ]);

        $tenagaAhli = TenagaAhli::findOrFail($id_tenagaahli);
        $tenagaAhli->update($validated);

        return redirect()->route('tenaga_ahli.index')->with('success', 'Tenaga Ahli updated successfully.');
    }

    public function destroy($id_tenagaahli) {
        $tenagaAhli = TenagaAhli::findOrFail($id_tenagaahli);
        $tenagaAhli->delete();

        return redirect()->route('tenaga_ahli.index')->with('success', 'Tenaga Ahli deleted successfully.');
    }
}
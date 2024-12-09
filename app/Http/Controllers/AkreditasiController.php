<?php

namespace App\Http\Controllers;

use App\Models\Akreditasi;
use Illuminate\Http\Request;

class AkreditasiController extends Controller {
    public function index() {
        $akreditasi = Akreditasi::all();
        return view('akreditasi.index', compact('akreditasi'));
    }

    public function create() {
        return view('akreditasi.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'no_sk' => 'required|string|max:255',
            'id_jenisakreditasi' => 'required|exists:jenis_akreditasis,id_jenisakreditasi',
            'nilai' => 'required|numeric',
            'id_lembaga' => 'required|exists:lembagas,id_lembaga',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
        ]);

        Akreditasi::create($validated);

        return redirect()->route('akreditasi.index')->with('success', 'Accreditation created successfully.');
    }

    public function show($id_akreditasi) {
        $akreditasi = Akreditasi::findOrFail($id_akreditasi);
        return view('akreditasi.show', compact('akreditasi'));
    }

    public function edit($id_akreditasi) {
        $akreditasi = Akreditasi::findOrFail($id_akreditasi);
        return view('akreditasi.edit', compact('akreditasi'));
    }

    public function update(Request $request, $id_akreditasi) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'no_sk' => 'required|string|max:255',
            'id_jenisakreditasi' => 'required|exists:jenis_akreditasis,id_jenisakreditasi',
            'nilai' => 'required|string|max:255',
            'id_lembaga' => 'required|exists:lembagas,id_lembaga',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
        ]);

        $akreditasi = Akreditasi::findOrFail($id_akreditasi);
        $akreditasi->update($validated);

        return redirect()->route('akreditasi.index')->with('success', 'Accreditation updated successfully.');
    }

    public function destroy($id_akreditasi) {
        $accreditation = Accreditation::findOrFail($id_akreditasi);
        $accreditation->delete();

        return redirect()->route('akreditasi.index')->with('success', 'Accreditation deleted successfully.');
    }
}
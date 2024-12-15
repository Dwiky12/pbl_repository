<?php

namespace App\Http\Controllers;

use App\Models\DokumenKurikulum;
use Illuminate\Http\Request;

class DokumenKurikulumController extends Controller {
    public function index() {
        $dokumenKurikulum = DokumenKurikulum::all();
        return view('dokumen_kurikulum.index', compact('dokumenKurikulum'));
    }

    public function create() {
        return view('dokumen_kurikulum.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_kurikulum' => 'required|string|max:255',
            'tahun_pemberlakuan' => 'required|integer',
            'semester' => 'required|string|max:255',
            'revisi_ke' => 'required|integer',
        ]);

        DokumenKurikulum::create($validated);

        return redirect()->route('dokumen_kurikulum.index')->with('success', 'Curriculum Document created successfully.');
    }

    public function show($id_dokumenkurikulum) {
        $dokumenKurikulum = DokumenKurikulum::findOrFail($id_dokumenkurikulum);
        return view('dokumen_kurikulum.show', compact('dokumenKurikulum'));
    }

    public function edit($id_dokumenkurikulum) {
        $dokumenKurikulum = DokumenKurikulum::findOrFail($id_dokumenkurikulum);
        return view('dokumen_kurikulum.edit', compact('dokumenKurikulum'));
    }

    public function update(Request $request, $id_dokumenkurikulum) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_kurikulum' => 'required|string|max:255',
            'tahun_pemberlakuan' => 'required|integer',
            'semester' => 'required|string|max:255',
            'revisi_ke' => 'required|integer',
        ]);

        $dokumenKurikulum = DokumenKurikulum::findOrFail($id_dokumenkurikulum);
        $dokumenKurikulum->update($validated);

        return redirect()->route('dokumen_kurikulum.index')->with('success', 'Curriculum Document updated successfully.');
    }

    public function destroy($id_dokumenkurikulum) {
        $dokumenKurikulum = DokumenKurikulum::findOrFail($id_dokumenkurikulum);
        $dokumenKurikulum->delete();

        return redirect()->route('dokumen_kurikulum.index')->with('success', 'Curriculum Document deleted successfully.');
    }
}
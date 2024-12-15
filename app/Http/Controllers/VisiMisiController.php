<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller {
    public function index() {
        $visiMisi = VisiMisi::all();
        return view('visi_misi.index', compact('visiMisi'));
    }

    public function create() {
        return view('visi_misi.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'tahun_pemberlakuan' => 'required|integer',
            'semester' => 'required|string|max:255',
            'revisi_ke' => 'required|integer',
        ]);

        VisiMisi::create($validated);

        return redirect()->route('visi_misi.index')->with('success', 'Vision and Mission created successfully.');
    }

    public function show($id_visimisi) {
        $visiMisi = VisiMisi::findOrFail($id_visimisi);
        return view('visi_misi.show', compact('visiMisi'));
    }

    public function edit($id_visimisi) {
        $visiMisi = VisiMisi::findOrFail($id_visimisi);
        return view('visi_misi.edit', compact('visiMisi'));
    }

    public function update(Request $request, $id_visimisi) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'tahun_pemberlakuan' => 'required|integer',
            'semester' => 'required|string|max:255',
            'revisi_ke' => 'required|integer',
        ]);

        $visiMisi = VisiMisi::findOrFail($id_visimisi);
        $visiMisi->update($validated);

        return redirect()->route('visi_misi.index')->with('success', 'Vision and Mission updated successfully.');
    }

    public function destroy($id_visimisi) {
        $visiMisi = VisionMission::findOrFail($id_visimisi);
        $visiMisi->delete();

        return redirect()->route('visi_misi.index')->with('success', 'Vision and Mission deleted successfully.');
    }
}
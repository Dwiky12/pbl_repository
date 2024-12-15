<?php

namespace App\Http\Controllers;

use App\Models\KoleksiJurnal;
use Illuminate\Http\Request;

class KoleksiJurnalController extends Controller {
    public function index() {
        $koleksiJurnal = KoleksiJurnal::all();
        return view('koleksi_jurnal.index', compact('koleksiJurnal'));
    }

    public function create() {
        return view('koleksi_jurnal.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_jurnal' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'semester' => 'required|string|max:255',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'jenis_jurnal' => 'required|string|max:255',
            'terindex' => 'required|string|max:255',
            'terindex_lainnya' => 'nullable|string|max:255',
            'penerbit' => 'required|string|max:255',
            'volume' => 'required|string|max:255',
            'jumlah_eksemplar' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        KoleksiJurnal::create($validated);

        return redirect()->route('koleksi_jurnal.index')->with('success', 'Koleksi Jurnal created successfully.');
    }

    public function show($id_koleksijurnal) {
        $koleksiJurnal = KoleksiJurnal::findOrFail($id_koleksijurnal);
        return view('koleksi_jurnal.show', compact('koleksiJurnal'));
    }

    public function edit($id_koleksijurnal) {
        $koleksiJurnal = KoleksiJurnal::findOrFail($id_koleksijurnal);
        return view('koleksi_jurnal.edit', compact('koleksiJurnal'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_jurnal' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'semester' => 'required|string|max:255',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'jenis_jurnal' => 'required|string|max:255',
            'terindex' => 'required|string|max:255',
            'terindex_lainnya' => 'nullable|string|max:255',
            'penerbit' => 'required|string|max:255',
            'volume' => 'required|string|max:255',
            'jumlah_eksemplar' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        $koleksiJurnal = KoleksiJurnal::findOrFail($id_koleksijurnal);
        $koleksiJurnal->update($validated);

        return redirect()->route('koleksi_jurnal.index')->with('success', 'Koleksi Jurnal updated successfully.');
    }

    public function destroy($id_koleksijurnal) {
        $koleksiJurnal = KoleksiJurnal::findOrFail($id_koleksijurnal);
        $koleksiJurnal->delete();

        return redirect()->route('koleksi_jurnal.index')->with('success', 'Koleksi Jurnal deleted successfully.');
    }
}
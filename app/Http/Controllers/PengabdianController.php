<?php

namespace App\Http\Controllers;

use App\Models\Pengabdian;
use Illuminate\Http\Request;

class PengabdianController extends Controller {
    public function index() {
        $pengabdian = Pengabdian::all();
        return view('pengabdian.index', compact('pengabdian'));
    }

    public function create() {
        return view('pengabdian.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_kegiatan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'jumlah_peserta' => 'required|integer',
        ]);

        Pengabdian::create($validated);

        return redirect()->route('pengabdian.index')->with('success', 'Pengabdian created successfully.');
    }

    public function show($id_pengabdian) {
        $pengabdian = Pengabdian::findOrFail($id_pengabdian);
        return view('pengabdian.show', compact('pengabdian'));
    }

    public function edit($id_pengabdian) {
        $pengabdian = Pengabdian::findOrFail($id_pengabdian);
        return view('pengabdian.edit', compact('pengabdian'));
    }

    public function update(Request $request, $id_pengabdian) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_kegiatan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'jumlah_peserta' => 'required|integer',
        ]);

        $pengabdian = Pengabdian::findOrFail($id_pengabdian);
        $pengabdian->update($validated);

        return redirect()->route('pengabdian.index')->with('success', 'Pengabdian updated successfully.');
    }

    public function destroy($id_pengabdian) {
        $pengabdian = Pengabdian::findOrFail($id_pengabdian);
        $pengabdian->delete();

        return redirect()->route('pengabdian.index')->with('success', 'Pengabdian deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\PengembanganDiri;
use Illuminate\Http\Request;

class PengembanganDiriController extends Controller {
    public function index() {
        $pengembanganDiri = PengembanganDiri::all();
        return view('pengembangan_diri.index', compact('pengembanganDiri'));
    }

    public function create() {
        return view('pengembangan_diri.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_kegiatan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'semester' => 'required|string|max:255',
            'id_pegawai' => 'required|exists:pegawais,id_pegawai',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'jenis' => 'required|string|max:255',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'penyelenggara' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'lama' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        PengembanganDiri::create($validated);

        return redirect()->route('pengembangan_diri.index')->with('success', 'Pengembangan Diri Pegawai created successfully.');
    }

    public function show($id_pengembangandiri) {
        $pengembanganDiri = PengembanganDiri::findOrFail($id_pengembangandiri);
        return view('pengembangan_diri.show', compact('pengembanganDiri'));
    }

    public function edit($id_pengembangandiri) {
        $pengembanganDiri = PengembanganDiri::findOrFail($id_pengembangandiri);
        return view('pengembangan_diri.edit', compact('pengembanganDiri'));
    }

    public function update(Request $request, $id_pengembangandiri) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_kegiatan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'semester' => 'required|string|max:255',
            'id_pegawai' => 'required|exists:pegawais,id_pegawai',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'jenis' => 'required|string|max:255',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'penyelenggara' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'lama' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        $pengembanganDiri = PengembanganDiri::findOrFail($id_pengembangandiri);
        $pengembanganDiri->update($validated);

        return redirect()->route('pengembangan_diri.index')->with('success', 'Pengembangan Diri Pegawai updated successfully.');
    }

    public function destroy($id_pengembangandiri) {
        $pengembanganDiri = PengembanganDiri::findOrFail($id_pengembangandiri);
        $pengembanganDiri->delete();

        return redirect()->route('pengembangan_diri.index')->with('success', 'Pengembangan Diri Pegawai deleted successfully.');
    }
}
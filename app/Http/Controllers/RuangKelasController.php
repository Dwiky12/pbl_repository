<?php

namespace App\Http\Controllers;

use App\Models\RuangKelas;
use Illuminate\Http\Request;

class RuangKelasController extends Controller {
    public function index() {
        $ruangKelas = RuangKelas::all();
        return view('ruang_kelas.index', compact('ruangKelas'));
    }

    public function create() {
        return view('ruang_kelas.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_ruangan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'semester' => 'required|string|max:255',
            'id_ruangan' => 'required|exists:ruangans,id_ruangan',
            'luas' => 'required|integer',
            'daya_tampung' => 'required|integer',
            'status_pemakaian' => 'required|string|max:255',
        ]);

        RuangKelas::create($validated);

        return redirect()->route('ruang_kelas.index')->with('success', 'Ruang Kelas created successfully.');
    }

    public function show($id_ruangkelas) {
        $ruangKelas = RuangKelas::findOrFail($id_ruangkelas);
        return view('ruang_kelas.show', compact('ruangKelas'));
    }

    public function edit($id_ruangkelas) {
        $ruangKelas = RuangKelas::findOrFail($id_ruangkelas);
        return view('ruang_kelas.edit', compact('ruangKelas'));
    }

    public function update(Request $request, $id_ruangkelas) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_ruangan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'semester' => 'required|string|max:255',
            'id_ruangan' => 'required|exists:ruangans,id_ruangan',
            'luas' => 'required|integer',
            'daya_tampung' => 'required|integer',
            'status_pemakaian' => 'required|string|max:255',
        ]);

        $ruangKelas = RuangKelas::findOrFail($id_ruangkelas);
        $ruangKelas->update($validated);

        return redirect()->route('ruang_kelas.index')->with('success', 'Ruang Kelas updated successfully.');
    }

    public function destroy($id_ruangkelas) {
        $ruangKelas = RuangKelas::findOrFail($id_ruangkelas);
        $ruangKelas->delete();

        return redirect()->route('ruang_kelas.index')->with('success', 'Ruang Kelas deleted successfully.');
    }
}
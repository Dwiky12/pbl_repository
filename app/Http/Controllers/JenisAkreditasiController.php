<?php

namespace App\Http\Controllers;

use App\Models\JenisAkreditasi;
use Illuminate\Http\Request;

class JenisAkreditasiController extends Controller {
    public function index() {
        $jenisAkreditasi = JenisAkreditasi::all();
        return view('jenis_akreditasi.index', compact('jenisAkreditasi'));
    }

    public function create() {
        return view('jenis_akreditasi.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'akreditasi' => 'required|string|max:255',
        ]);

        JenisAkreditasi::create($validated);

        return redirect()->route('jenis_akreditasi.index')->with('success', 'Jenis Akreditasi created successfully.');
    }

    public function show($id_jenisakreditasi) {
        $jenisAkreditasi = JenisAkreditasi::findOrFail($id_jenisakreditasi);
        return view('jenis_akreditasi.show', compact('jenisAkreditasi'));
    }

    public function edit($id_jenisakreditasi) {
        $jenisAkreditasi = JenisAkreditasi::findOrFail($id_jenisakreditasi);
        return view('jenis_akreditasi.edit', compact('jenisAkreditasi'));
    }

    public function update(Request $request, $id_jenisakreditasi) {
        $validated = $request->validate([
            'akreditasi' => 'required|string|max:255',
        ]);

        $jenisAkreditasi = JenisAkreditasi::findOrFail($id_jenisakreditasi);
        $jenisAkreditasi->update($validated);

        return redirect()->route('jenis_akreditasi.index')->with('success', 'Jenis Akreditasi updated successfully.');
    }

    public function destroy($id_jenisakreditasi) {
        $jenisAkreditasi = JenisAkreditasi::findOrFail($id_jenisakreditasi);
        $jenisAkreditasi->delete();

        return redirect()->route('jenis_akreditasi.index')->with('success', 'Jenis Akreditasi deleted successfully.');
    }
}
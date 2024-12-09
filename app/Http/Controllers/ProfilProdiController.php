<?php

namespace App\Http\Controllers;

use App\Models\ProfilProdi;
use Illuminate\Http\Request;

class ProfilProdiController extends Controller {
    public function index() {
        $profilProdi = ProfilProdi::all();
        return view('profil_prodi.index', compact('profilProdi'));
    }

    public function create() {
        return view('profil_prodi.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'tahun_penggunaan' => 'required|integer',
            'revisi_ke' => 'required|integer',
        ]);

        ProfilProdi::create($validated);

        return redirect()->route('profil_prodi.index')->with('success', 'Study Program Profile created successfully.');
    }

    public function show($id_profilprodi) {
        $profilProdi = ProfilProdi::findOrFail($id_profilprodi);
        return view('profil_prodi.show', compact('profilProdi'));
    }

    public function edit($id_profilprodi) {
        $profilProdi = ProfilProdi::findOrFail($id_profilprodi);
        return view('profil_prodi.edit', compact('profilProdi'));
    }

    public function update(Request $request, $id_profilprodi) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'tahun_penggunaan' => 'required|integer',
            'revisi_ke' => 'required|integer',
        ]);

        $profilProdi = ProfilProdi::findOrFail($id_profilprodi);
        $profilProdi->update($validated);

        return redirect()->route('profil_prodi.index')->with('success', 'Study Program Profile updated successfully.');
    }

    public function destroy($id_profilprodi) {
        $profilProdi = ProfilProdi::findOrFail($id_profilprodi);
        $profilProdi->delete();

        return redirect()->route('profil_prodi.index')->with('success', 'Study Program Profile deleted successfully.');
    }
}
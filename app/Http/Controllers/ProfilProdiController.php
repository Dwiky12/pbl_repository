<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilProdi;
use App\Models\Prodi;

class ProfilProdiController extends Controller {
    public function index() {
        $profilProdi = ProfilProdi::with('prodi')->get();
        return view('profil_prodi.index', compact('profilProdi'));
    }

    public function create() {
        $prodi = Prodi::all();
        return view('profil_prodi.create', compact('prodi'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'tahun_penggunaan' => 'required|integer',
            'revisi_ke' => 'required|integer',
            'file_dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $profilProdi = new ProfilProdi($validated);
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $profilProdi->file_dokumen = $filename;
        }
        $profilProdi->status = 'pending';
        $profilProdi->save();

        return redirect()->route('profil_prodi.index')->with('success', 'Profil Prodi created successfully.');
    }

    public function show($id_profilprodi) {
        $profilProdi = ProfilProdi::with('prodi')->findOrFail($id_profilprodi);
        return view('profil_prodi.show', compact('profilProdi'));
    }

    public function edit($id_profilprodi) {
        $profilProdi = ProfilProdi::findOrFail($id_profilprodi);
        $prodi = Prodi::all();
        return view('profil_prodi.edit', compact('profilProdi', 'prodi'));
    }

    public function update(Request $request, $id_profilprodi) {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'tahun_penggunaan' => 'required|integer',
            'revisi_ke' => 'required|integer',
            'file_dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $profilProdi = ProfilProdi::findOrFail($id_profilprodi);
        $profilProdi->fill($validated);
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $profilProdi->file_dokumen = $filename;
        }
        $profilProdi->save();

        return redirect()->route('profil_prodi.index')->with('success', 'Profil Prodi updated successfully.');
    }

    public function destroy($id_profilprodi) {
        $profilProdi = ProfilProdi::findOrFail($id_profilprodi);
        $profilProdi->delete();
        return redirect()->route('profil_prodi.index')->with('success', 'Profil Prodi deleted successfully.');
    }

    public function approve($id_profilprodi) {
        $profilProdi = ProfilProdi::findOrFail($id_profilprodi);
        $profilProdi->status = 'approved';
        $profilProdi->save();
        return redirect()->route('profil_prodi.index')->with('success', 'Profil Prodi approved successfully.');
    }

    public function reject($id_profilprodi) {
        $profilProdi = ProfilProdi::findOrFail($id_profilprodi);
        $profilProdi->status = 'rejected';
        $profilProdi->save();
        return redirect()->route('profil_prodi.index')->with('success', 'Profil Prodi rejected successfully.');
    }
}
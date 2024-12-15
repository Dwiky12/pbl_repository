<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenKurikulum;
use App\Models\Prodi;

class DokumenKurikulumController extends Controller {
    public function index() {
        $dokumenKurikulum = DokumenKurikulum::with('prodi')->get();
        return view('dokumen_kurikulum.index', compact('dokumenKurikulum'));
    }

    public function create() {
        $prodi = Prodi::all();
        return view('dokumen_kurikulum.create', compact('prodi'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_kurikulum' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'semester' => 'required|string|max:255',
            'revisi_ke' => 'required|integer',
            'file_dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $dokumenKurikulum = new DokumenKurikulum($validated);
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $dokumenKurikulum->file_dokumen = $filename;
        }
        $dokumenKurikulum->save();

        return redirect()->route('dokumen_kurikulum.index')->with('success', 'Dokumen Kurikulum created successfully.');
    }

    public function show($id_dokumenkurikulum) {
        $dokumenKurikulum = DokumenKurikulum::with('prodi')->findOrFail($id_dokumenkurikulum);
        return view('dokumen_kurikulum.show', compact('dokumenKurikulum'));
    }

    public function edit($id_dokumenkurikulum) {
        $dokumenKurikulum = DokumenKurikulum::findOrFail($id_dokumenkurikulum);
        $prodi = Prodi::all();
        return view('dokumen_kurikulum.edit', compact('dokumenKurikulum', 'prodi'));
    }

    public function update(Request $request, $id_dokumenkurikulum) {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_kurikulum' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'semester' => 'required|string|max:255',
            'revisi_ke' => 'required|integer',
            'file_dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $dokumenKurikulum = DokumenKurikulum::findOrFail($id_dokumenkurikulum);
        $dokumenKurikulum->fill($validated);
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $dokumenKurikulum->file_dokumen = $filename;
        }
        $dokumenKurikulum->save();

        return redirect()->route('dokumen_kurikulum.index')->with('success', 'Dokumen Kurikulum updated successfully.');
    }

    public function destroy($id_dokumenkurikulum) {
        $dokumenKurikulum = DokumenKurikulum::findOrFail($id_dokumenkurikulum);
        $dokumenKurikulum->delete();
        return redirect()->route('dokumen_kurikulum.index')->with('success', 'Dokumen Kurikulum deleted successfully.');
    }

    public function approve($id_dokumenkurikulum) { 
        $dokumenKurikulum = DokumenKurikulum::findOrFail($id_dokumenkurikulum); 
        $dokumenKurikulum->status = 'Diterima'; 
        $dokumenKurikulum->save(); 
        return redirect()->route('curriculum-dokumenKurikulum.index')->with('success', 'Dokumen Kurikulum approved successfully.'); 
    } 
    public function reject($id_dokumenkurikulum) { 
        $dokumenKurikulum = DokumenKurikulum::findOrFail($id_dokumenkurikulum); 
        $dokumenKurikulum->status = 'Ditolak'; 
        $dokumenKurikulum->save(); 
        return redirect()->route('curriculum-document.index')->with('success', 'Dokumen Kurikulum rejected successfully.');
    }
}
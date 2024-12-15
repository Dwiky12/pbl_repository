<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;
use App\Models\Prodi;

class VisiMisiController extends Controller {
    public function index() {
        $visiMisi = VisiMisi::with('prodi')->get();
        return view('visi_misi.index', compact('visiMisi'));
    }

    public function create() {
        $prodi = Prodi::all();
        return view('visi_misi.create', compact('prodi'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'visi' => 'required|string|max:255',
            'misi' => 'required|string|max:255',
            'tahun_pemberlakuan' => 'required|integer',
            'semester_pemberlakuan' => 'required|string|max:255',
            'revisi_ke' => 'required|integer',
            'file_dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $visiMisi = new VisiMisi($validated);
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $visiMisi->file_dokumen = $filename;
        }
        $visiMisi->status = 'pending';
        $visiMisi->save();

        return redirect()->route('visi_misi.index')->with('success', 'Visi Misi created successfully.');
    }

    public function show($id_visimisi) {
        $visiMisi = VisiMisi::with('prodi')->findOrFail($id_visimisi);
        return view('visi_misi.show', compact('visiMisi'));
    }

    public function edit($id_visimisi) {
        $visiMisi = VisiMisi::findOrFail($id_visimisi);
        $prodi = Prodi::all();
        return view('visi_misi.edit', compact('visiMisi', 'prodi'));
    }

    public function update(Request $request, $id_visimisi) {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'visi' => 'required|string|max:255',
            'misi' => 'required|string|max:255',
            'tahun_pemberlakuan' => 'required|integer',
            'semester_pemberlakuan' => 'required|string|max:255',
            'revisi_ke' => 'required|integer',
            'file_dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $visiMisi = VisiMisi::findOrFail($id_visimisi);
        $visiMisi->fill($validated);
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $visiMisi->file_dokumen = $filename;
        }
        $visiMisi->save();

        return redirect()->route('visi_misi.index')->with('success', 'Visi Misi updated successfully.');
    }

    public function destroy($id_visimisi) {
        $visiMisi = VisiMisi::findOrFail($id_visimisi);
        $visiMisi->delete();
        return redirect()->route('visi_misi.index')->with('success', 'Visi Misi deleted successfully.');
    }

    public function approve($id_visimisi) {
        $visiMisi = VisiMisi::findOrFail($id_visimisi);
        $visiMisi->status = 'approved';
        $visiMisi->save();
        return redirect()->route('visi_misi.index')->with('success', 'Visi Misi approved successfully.');
    }

    public function reject($id_visimisi) {
        $visiMisi = VisiMisi::findOrFail($id_visimisi);
        $visiMisi->status = 'rejected';
        $visiMisi->save();
        return redirect()->route('visi_misi.index')->with('success', 'Visi Misi rejected successfully.');
    }


}
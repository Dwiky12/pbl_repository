<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sop;
use App\Models\Prodi;
use App\Models\KategoriSop;

class SopController extends Controller {
    public function index() {
        $sop = Sop::with(['prodi', 'kategoriSop'])->get();
        return view('sop.index', compact('sop'));
    }

    public function create() {
        $prodi = Prodi::all();
        $kategoriSop = KategoriSop::all();
        return view('sop.create', compact('prodi', 'kategoriSop'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'id_kategorisop' => 'required|exists:kategori_sops,id_kategorisop',
            'nama_sop' => 'required|string|max:255',
            'file_dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $sop = new Sop($validated);
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $sop->file_dokumen = $filename;
        }
        $sop->status = 'pending';
        $sop->save();

        return redirect()->route('sop.index')->with('success', 'SOP created successfully.');
    }

    public function show($id_sop) {
        $sop = Sop::with(['prodi', 'kategoriSop'])->findOrFail($id_sop);
        return view('sop.show', compact('sop'));
    }

    public function edit($id_sop) {
        $sop = Sop::findOrFail($id_sop);
        $prodi = Prodi::all();
        $kategoriSops = KategoriSop::all();
        return view('sop.edit', compact('sop', 'prodi', 'kategoriSops'));
    }

    public function update(Request $request, $id_sop) {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'id_kategorisop' => 'required|exists:kategori_sops,id_kategorisop',
            'nama_sop' => 'required|string|max:255',
            'file_dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $sop = Sop::findOrFail($id_sop);
        $sop->fill($validated);
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $sop->file_dokumen = $filename;
        }
        $sop->save();

        return redirect()->route('sop.index')->with('success', 'SOP updated successfully.');
    }

    public function destroy($id_sop) {
        $sop = Sop::findOrFail($id_sop);
        $sop->delete();
        return redirect()->route('sop.index')->with('success', 'SOP deleted successfully.');
    }

    public function approve($id_sop) {
        $sop = Sop::findOrFail($id_sop);
        $sop->status = 'approved';
        $sop->save();
        return redirect()->route('sop.index')->with('success', 'SOP approved successfully.');
    }

    public function reject($id_sop) {
        $sop = Sop::findOrFail($id_sop);
        $sop->status = 'rejected';
        $sop->save();
        return redirect()->route('sop.index')->with('success', 'SOP rejected successfully.');
    }
}
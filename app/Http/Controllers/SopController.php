<?php

namespace App\Http\Controllers;

use App\Models\Sop;
use Illuminate\Http\Request;

class SopController extends Controller {
    public function index() {
        $sop = Sop::all();
        return view('sop.index', compact('sop'));
    }

    public function create() {
        return view('sop.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'id_kategorisop' => 'required|exists:kategori_sops,id_kategorisop',
            'nama_sop' => 'required|string|max:255',
        ]);

        Sop::create($validated);

        return redirect()->route('sop.index')->with('success', 'SOP created successfully.');
    }

    public function show($id_sop) {
        $sop = Sop::findOrFail($id_sop);
        return view('sop.show', compact('sop'));
    }

    public function edit($id_sop) {
        $sop = Sop::findOrFail($id_sop);
        return view('sop.edit', compact('sop'));
    }

    public function update(Request $request, $id_sop) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'id_kategorisop' => 'required|exists:kategori_sops,id_kategorisop',
            'nama_sop' => 'required|string|max:255',
        ]);

        $sop = Sop::findOrFail($id_sop);
        $sop->update($validated);

        return redirect()->route('sop.index')->with('success', 'SOP updated successfully.');
    }

    public function destroy($id_sop) {
        $sop = Sop::findOrFail($id_sop);
        $sop->delete();

        return redirect()->route('sop.index')->with('success', 'SOP deleted successfully.');
    }
}
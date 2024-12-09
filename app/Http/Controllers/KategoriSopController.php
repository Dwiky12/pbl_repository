<?php

namespace App\Http\Controllers;

use App\Models\KategoriSop;
use Illuminate\Http\Request;

class KategoriSopController extends Controller {
    public function index() {
        $kategoriSop = KategoriSop::all();
        return view('kategori_sop.index', compact('kategoriSop'));
    }

    public function create() {
        return view('kategori_sop.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriSop::create($validated);

        return redirect()->route('kategori_sop.index')->with('success', 'Kategori SOP created successfully.');
    }

    public function show($id_kategorisop) {
        $kategoriSop = KategoriSop::findOrFail($id_kategorisop);
        return view('kategori_sop.show', compact('kategoriSop'));
    }

    public function edit($id_kategorisop) {
        $kategoriSop = KategoriSop::findOrFail($id_kategorisop);
        return view('kategori_sop.edit', compact('kategoriSop'));
    }

    public function update(Request $request, $id_kategorisop) {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategoriSop = KategoriSop::findOrFail($id_kategorisop);
        $kategoriSop->update($validated);

        return redirect()->route('kategori_sop.index')->with('success', 'Kategori SOP updated successfully.');
    }

    public function destroy($id_kategorisop) {
        $kategoriSop = KategoriSop::findOrFail($id_kategorisop);
        $kategoriSop->delete();

        return redirect()->route('kategori_sop.index')->with('success', 'Kategori SOP deleted successfully.');
    }
}
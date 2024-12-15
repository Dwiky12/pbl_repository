<?php

namespace App\Http\Controllers;

use App\Models\Kebangsaan;
use Illuminate\Http\Request;

class KebangsaanController extends Controller {
    public function index() {
        $kebangsaan = Kebangsaan::all();
        return view('kebangsaan.index', compact('kebangsaan'));
    }

    public function create() {
        return view('kebangsaan.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'tahun' => 'required|integer',
            'url_penyelenggara' => 'required|string|max:255',
        ]);

        Kebangsaan::create($validated);

        return redirect()->route('kebangsaan.index')->with('success', 'Mental Kebangsaan created successfully.');
    }

    public function show($id_kebangsan) {
        $kebangsaan = Kebangsaan::findOrFail($id_kebangsan);
        return view('kebangsaan.show', compact('kebangsaan'));
    }

    public function edit($id_kebangsan) {
        $kebangsaan = Kebangsaan::findOrFail($id_kebangsan);
        return view('kebangsaan.edit', compact('kebangsaan'));
    }

    public function update(Request $request, $id_kebangsan) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'tahun' => 'required|integer',
            'url_penyelenggara' => 'required|string|max:255',
        ]);

        $kebangsaan = Kebangsaan::findOrFail($id_kebangsan);
        $kebangsaan->update($validated);

        return redirect()->route('kebangsaan.index')->with('success', 'Mental Kebangsaan updated successfully.');
    }

    public function destroy($id_kebangsan) {
        $kebangsaan = Kebangsaan::findOrFail($id_kebangsan);
        $kebangsaan->delete();

        return redirect()->route('kebangsaan.index')->with('success', 'Mental Kebangsaan deleted successfully.');
    }
}
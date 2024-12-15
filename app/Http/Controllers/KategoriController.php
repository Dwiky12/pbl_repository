<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller {
    public function index() {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create() {
        return view('kategori.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Kategori::create($validated);

        return redirect()->route('kategori.index')->with('success', 'Kategori created successfully.');
    }

    public function show($id_kategori) {
        $kategori = Kategori::findOrFail($id_kategori);
        return view('kategori.show', compact('kategori'));
    }

    public function edit($id_kategori) {
        $kategori = Kategori::findOrFail($id_kategori);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id_kategori) {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->update($validated);

        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully.');
    }

    public function destroy($id_kategori) {
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller {
    public function index() {
        $ruangan = Ruangan::all();
        return view('ruangan.index', compact('ruangan'));
    }

    public function create() {
        return view('ruangan.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'ruangan' => 'required|string|max:255',
        ]);

        Ruangan::create($validated);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan created successfully.');
    }

    public function show($id_ruangan) {
        $ruangan = Ruangan::findOrFail($id_ruangan);
        return view('ruangan.show', compact('ruangan'));
    }

    public function edit($id_ruangan) {
        $ruangan = Ruangan::findOrFail($id_ruangan);
        return view('ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, $id_ruangan) {
        $validated = $request->validate([
            'ruangan' => 'required|string|max:255',
        ]);

        $ruangan = Ruangan::findOrFail($id_ruangan);
        $ruangan->update($validated);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan updated successfully.');
    }

    public function destroy($id_ruangan) {
        $ruangan = Ruangan::findOrFail($id_ruangan);
        $ruangan->delete();

        return redirect()->route('ruangan.index')->with('success', 'Ruangan deleted successfully.');
    }
}
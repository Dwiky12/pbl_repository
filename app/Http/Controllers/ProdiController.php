<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller {
    public function index() {
        $prodi = Prodi::all();
        return view('prodi.index', compact('prodi'));
    }

    public function create() {
        return view('prodi.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_prodi' => 'required|string|max:255',
        ]);

        Prodi::create($validated);

        return redirect()->route('prodi.index')->with('success', 'Prodi created successfully.');
    }

    public function show($id_prodi) {
        $prodi = Prodi::findOrFail($id_prodi);
        return view('prodi.show', compact('prodi'));
    }

    public function edit($id_prodi) {
        $prodi = Prodi::findOrFail($id_prodi);
        return view('prodi.edit', compact('prodi'));
    }

    public function update(Request $request, $id_prodi) {
        $validated = $request->validate([
            'nama_prodi' => 'required|string|max:255',
        ]);

        $prodi = Prodi::findOrFail($id_prodi);
        $prodi->update($validated);

        return redirect()->route('prodi.index')->with('success', 'Prodi updated successfully.');
    }

    public function destroy($id_prodi) {
        $prodi = Prodi::findOrFail($id_prodi);
        $prodi->delete();

        return redirect()->route('prodi.index')->with('success', 'Prodi deleted successfully.');
    }
}
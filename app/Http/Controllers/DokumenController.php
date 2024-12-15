<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller {
    public function index() {
        $dokumen = Dokumen::all();
        return view('dokumen.index', compact('dokumen'));
    }

    public function create() {
        return view('dokumen.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'tipe' => 'required|string|max:255',
            'file_path' => 'required|string|max:255',
            'id_user' => 'required|exists:users,id_user',
            'approved' => 'boolean',
        ]);

        Dokumen::create($validated);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen created successfully.');
    }

    public function show($id_dokumen) {
        $dokumen = Dokumen::findOrFail($id_dokumen);
        return view('dokumen.show', compact('dokumen'));
    }

    public function edit($id_dokumen) {
        $dokumen = Dokumen::findOrFail($id_dokumen);
        return view('dokumen.edit', compact('dokumen'));
    }

    public function update(Request $request, $id_dokumen) {
        $validated = $request->validate([
            'tipe' => 'required|string|max:255',
            'file_path' => 'required|string|max:255',
            'id_user' => 'required|exists:users,id_user',
            'approved' => 'boolean',
        ]);

        $dokumen = Dokumen::findOrFail($id_dokumen);
        $dokumen->update($validated);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen updated successfully.');
    }

    public function destroy($id_dokumen) {
        $dokumen = Dokumen::findOrFail($id_dokumen);
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen deleted successfully.');
    }
}
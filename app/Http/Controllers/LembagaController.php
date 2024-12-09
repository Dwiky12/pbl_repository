<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller {
    public function index() {
        $lembaga = Lembaga::all();
        return view('lembaga.index', compact('lembaga'));
    }

    public function create() {
        return view('lembaga.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama_lembaga' => 'required|string|max:255',
        ]);

        Lembaga::create($validated);

        return redirect()->route('lembaga.index')->with('success', 'Lembaga created successfully.');
    }

    public function show($id_lembaga) {
        $lembaga = Lembaga::findOrFail($id_lembaga);
        return view('lembaga.show', compact('lembaga'));
    }

    public function edit($id_lembaga) {
        $lembaga = Lembaga::findOrFail($id_lembaga);
        return view('lembaga.edit', compact('lembaga'));
    }

    public function update(Request $request, $id_lembaga) {
        $validated = $request->validate([
            'lembaga' => 'required|string|max:255',
        ]);

        $lembaga = Lembaga::findOrFail($id_lembaga);
        $lembaga->update($validated);

        return redirect()->route('lembaga.index')->with('success', 'Lembaga updated successfully.');
    }

    public function destroy($id_lembaga) {
        $lembaga = Lembaga::findOrFail($id_lembaga);
        $lembaga->delete();

        return redirect()->route('lembaga.index')->with('success', 'Lembaga deleted successfully.');
    }
}
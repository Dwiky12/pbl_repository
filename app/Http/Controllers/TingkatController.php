<?php

namespace App\Http\Controllers;

use App\Models\Tingkat;
use Illuminate\Http\Request;

class TingkatController extends Controller {
    public function index() {
        $tingkat = Tingkat::all();
        return view('tingkat.index', compact('tingkat'));
    }

    public function create() {
        return view('tingkat.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'tingkatan' => 'required|string|max:255',
        ]);

        Tingkat::create($validated);

        return redirect()->route('tingkat.index')->with('success', 'Tingkat created successfully.');
    }

    public function show($id_tingkat) {
        $tingkat = Tingkat::findOrFail($id_tingkat);
        return view('tingkat.show', compact('tingkat'));
    }

    public function edit($id_tingkat) {
        $tingkat = Tingkat::findOrFail($id_tingkat);
        return view('tingkat.edit', compact('tingkat'));
    }

    public function update(Request $request, $id_tingkat) {
        $validated = $request->validate([
            'tingkatan' => 'required|string|max:255',
        ]);

        $tingkat = Tingkat::findOrFail($id_tingkat);
        $tingkat->update($validated);

        return redirect()->route('tingkat.index')->with('success', 'Tingkat updated successfully.');
    }

    public function destroy($id_tingkat) {
        $tingkat = Tingkat::findOrFail($id_tingkat);
        $tingkat->delete();

        return redirect()->route('tingkat.index')->with('success', 'Tingkat deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller {
    public function index() {
        $skema = Skema::all();
        return view('skema.index', compact('skema'));
    }

    public function create() {
        return view('skema.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'skema' => 'required|string|max:255',
        ]);

        Skema::create($validated);

        return redirect()->route('skema.index')->with('success', 'Skema created successfully.');
    }

    public function show($id_skema) {
        $skema = Skema::findOrFail($id_skema);
        return view('skema.show', compact('skema'));
    }

    public function edit($id_skema) {
        $skema = Skema::findOrFail($id_skema);
        return view('skema.edit', compact('skema'));
    }

    public function update(Request $request, $id_skema) {
        $validated = $request->validate([
            'skema' => 'required|string|max:255',
        ]);

        $skema = Skema::findOrFail($id_skema);
        $skema->update($validated);

        return redirect()->route('skema.index')->with('success', 'Skema updated successfully.');
    }

    public function destroy($id_skema) {
        $skema = Skema::findOrFail($id_skema);
        $skema->delete();

        return redirect()->route('skema.index')->with('success', 'Skema deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Narasumber;
use Illuminate\Http\Request;

class NarasumberController extends Controller {
    public function index() {
        $narasumber = Narasumber::all();
        return view('narasumber.index', compact('narasumber'));
    }

    public function create() {
        return view('narasumber.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'asal' => 'required|string|max:255',
        ]);

        Narasumber::create($validated);

        return redirect()->route('narasumber.index')->with('success', 'Narasumber created successfully.');
    }

    public function show($id_narasumber) {
        $narasumber = Narasumber::findOrFail($id_narasumber);
        return view('narasumber.show', compact('narasumber'));
    }

    public function edit($id_narasumber) {
        $narasumber = Narasumber::findOrFail($id_narasumber);
        return view('narasumber.edit', compact('narasumber'));
    }

    public function update(Request $request, $id_narasumber) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'asal' => 'required|string|max:255',
        ]);

        $narasumber = Narasumber::findOrFail($id_narasumber);
        $narasumber->update($validated);

        return redirect()->route('narasumber.index')->with('success', 'Narasumber updated successfully.');
    }

    public function destroy($id_narasumber) {
        $narasumber = Narasumber::findOrFail($id_narasumber);
        $narasumber->delete();

        return redirect()->route('narasumber.index')->with('success', 'Narasumber deleted successfully.');
    }
}
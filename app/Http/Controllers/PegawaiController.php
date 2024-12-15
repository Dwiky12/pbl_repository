<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller {
    public function index() {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create() {
        return view('pegawai.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nip' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        Pegawai::create($validated);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai created successfully.');
    }

    public function show($id_pegawai) {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        return view('pegawai.show', compact('pegawai'));
    }

    public function edit($id_pegawai) {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id_pegawai) {
        $validated = $request->validate([
            'nip' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $pegawai = Pegawai::findOrFail($id_pegawai);
        $pegawai->update($validated);

        return redirect()->route('pegawai.index')->with('success', 'Pegawai updated successfully.');
    }

    public function destroy($id_pegawai) {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller {
    public function index() {
        $seminar = Seminar::all();
        return view('seminar.index', compact('seminar'));
    }

    public function create() {
        return view('seminar.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_kegiatan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'semester' => 'required|string|max:255',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'id_kegiatan' => 'required|exists:kegiatans,id-kegiatan',
            'id_skema' => 'required|exists:skemas,id_skema',
            'tempat' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'id_narasumber' => 'required|exists:narasumbers,id_narasumber',
        ]);

        Seminar::create($validated);

        return redirect()->route('seminar.index')->with('success', 'Seminar created successfully.');
    }

    public function show($id_seminar) {
        $seminar = Seminar::findOrFail($id_seminar);
        return view('seminar.show', compact('seminar'));
    }

    public function edit($id_seminar) {
        $seminar = Seminar::findOrFail($id_seminar);
        return view('seminar.edit', compact('seminar'));
    }

    public function update(Request $request, $id_seminar) {
        $validated = $request->validate([
            'id_dokumen' => 'required|exists:dokumens,id_dokumen',
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'nama_kegiatan' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'semester' => 'required|string|max:255',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'id_kegiatan' => 'required|exists:kegiatans,id-kegiatan',
            'id_skema' => 'required|exists:skemas,id_skema',
            'tempat' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'id_narasumber' => 'required|exists:narasumbers,id_narasumber',
        ]);

        $seminar = Seminar::findOrFail($id_seminar);
        $seminar->update($validated);

        return redirect()->route('seminars.index')->with('success', 'Seminar updated successfully.');
    }

    public function destroy($id_seminar) {
        $seminar = Seminar::findOrFail($id_seminar);
        $seminar->delete();

        return redirect()->route('seminars.index')->with('success', 'Seminar deleted successfully.');
    }
}
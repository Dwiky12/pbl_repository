<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akreditasi;
use App\Models\Prodi;
use App\Models\JenisAkreditasi;
use App\Models\Lembaga;
use App\Models\Tingkat;

class AkreditasiController extends Controller {
    public function index() {
        $akreditasi = Akreditasi::with(['prodi', 'jenisAkreditasi', 'lembaga', 'tingkat'])->get();
        return view('akreditasi.index', compact('akreditasi'));
    }

    public function create() {
        $prodi = Prodi::all();
        $jenisAkreditasi = JenisAkreditasi::all();
        $lembaga = Lembaga::all();
        $tingkat = Tingkat::all();
        return view('akreditasi.create', compact('prodi', 'jenisAkreditasi', 'lembaga', 'tingkat'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'no_sk' => 'required|string|max:255',
            'id_jenisakreditasi' => 'required|exists:jenis_akreditasis,id_jenisakreditasi',
            'nilai_akreditasi' => 'required|numeric',
            'id_lembaga' => 'required|exists:lembagas,id_lembaga',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'file_dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $akreditasi = new Akreditasi($validated);
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $akreditasi->file_dokumen = $filename;
        }
        $akreditasi->status = 'pending';
        $akreditasi->save();

        return redirect()->route('akreditasi.index')->with('success', 'Akreditasi created successfully.');
    }

    public function show($id_akreditasi) {
        $akreditasi = Akreditasi::with(['prodi', 'jenisAkreditasi', 'lembaga', 'tingkat'])->findOrFail($id_akreditasi);
        return view('akreditasi.show', compact('akreditasi'));
    }

    public function edit($id_akreditasi) {
        $akreditasi = Akreditasi::findOrFail($id_akreditasi);
        $prodi = Prodi::all();
        $jenisAkreditasi = JenisAkreditasi::all();
        $lembaga = Lembaga::all();
        $tingkat = Tingkat::all();
        return view('akreditasi.edit', compact('akreditasi', 'prodi', 'jenisAkreditasi', 'lembaga', 'tingkat'));
    }

    public function update(Request $request, $id_akreditasi) {
        $validated = $request->validate([
            'id_prodi' => 'required|exists:prodis,id_prodi',
            'no_sk' => 'required|string|max:255',
            'id_jenisakreditasi' => 'required|exists:jenis_akreditasis,id_jenisakreditasi',
            'nilai_akreditasi' => 'required|numeric',
            'id_lembaga' => 'required|exists:lembagas,id_lembaga',
            'id_tingkat' => 'required|exists:tingkats,id_tingkat',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'file_dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $akreditasi = Akreditasi::findOrFail($id_akreditasi);
        $akreditasi->fill($validated);
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $akreditasi->file_dokumen = $filename;
        }
        $akreditasi->save();

        return redirect()->route('akreditasi.index')->with('success', 'Akreditasi updated successfully.');
    }

    public function destroy($id_akreditasi) {
        $akreditasi = Akreditasi::findOrFail($id_akreditasi);
        $akreditasi->delete();
        return redirect()->route('akreditasi.index')->with('success', 'Akreditasi deleted successfully.');
    }

    public function approve($id_akreditasi) {
        $akreditasi = Akreditasi::findOrFail($id_akreditasi);
        $akreditasi->status = 'approved';
        $akreditasi->save();
        return redirect()->route('akreditasi.index')->with('success', 'Akreditasi approved successfully.');
    }

    public function reject($id_akreditasi) {
        $akreditasi = Akreditasi::findOrFail($id_akreditasi);
        $akreditasi->status = 'rejected';
        $akreditasi->save();
        return redirect()->route('akreditasi.index')->with('success', 'Akreditasi rejected successfully.');
    }
}
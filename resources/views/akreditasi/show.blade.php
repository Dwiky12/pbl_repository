@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Detail Akreditasi</h1>
        <div class="card">
            <div class="card-header">
                {{ $akreditasi->no_sk }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama Prodi</h5>
                <p>{{ $akreditasi->prodi->nama_prodi }}</p>
                <h5 class="card-title">Jenis Akreditasi</h5>
                <p>{{ $akreditasi->jenisAkreditasi->akreditasi }}</p>
                <h5 class="card-title">Nilai Akreditasi</h5>
                <p>{{ $akreditasi->nilai_akreditasi }}</p>
                <h5 class="card-title">Lembaga Akreditasi</h5>
                <p>{{ $akreditasi->lembaga->nama_lembaga }}</p>
                <h5 class="card-title">Tingkat</h5>
                <p>{{ $akreditasi->tingkat->tingkatan }}</p>
                <h5 class="card-title">Tanggal Mulai</h5>
                <p>{{ $akreditasi->tanggal_mulai }}</p>
                <h5 class="card-title">Tanggal Berakhir</h5>
                <p>{{ $akreditasi->tanggal_berakhir }}</p>
                <h5 class="card-title">File Dokumen</h5>
                <p><a href="{{ asset('uploads/' . $akreditasi->file_dokumen) }}" target="_blank">Download</a></p>
                <h5 class="card-title">Status</h5>
                <p>{{ $akreditasi->status }}</p>
                <a href="{{ route('akreditasi.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection

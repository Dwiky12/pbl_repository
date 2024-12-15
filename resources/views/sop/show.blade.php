@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Detail SOP</h1>
        <div class="card">
            <div class="card-header">
                {{ $sop->nama_sop }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama Prodi</h5>
                <p>{{ $sop->prodi->nama_prodi }}</p>
                <h5 class="card-title">Kategori</h5>
                <p>{{ $sop->kategoriSop->nama_kategori }}</p>
                <h5 class="card-title">Nama SOP</h5>
                <p>{{ $sop->nama_sop }}</p>
                <h5 class="card-title">File Dokumen</h5>
                <p><a href="{{ asset('uploads/' . $sop->file_dokumen) }}" target="_blank">Download</a></p>
                <h5 class="card-title">Status</h5>
                <p>{{ $sop->status }}</p>
                <a href="{{ route('sop.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Detail Profil Prodi</h1>
        <div class="card">
            <div class="card-header">
                {{ $profilProdi->prodi->nama_prodi }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Tahun Penggunaan</h5>
                <p>{{ $profilProdi->tahun_penggunaan }}</p>
                <h5 class="card-title">Revisi Ke</h5>
                <p>{{ $profilProdi->revisi_ke }}</p>
                <h5 class="card-title">File Dokumen</h5>
                <p><a href="{{ asset('uploads/' . $profilProdi->file_dokumen) }}" target="_blank">Download</a></p>
                <h5 class="card-title">Status</h5>
                <p>{{ $profilProdi->status }}</p>
                <a href="{{ route('profil_prodi.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection

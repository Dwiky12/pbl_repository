@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Detail Dokumen Kurikulum</h1>
        <div class="card">
            <div class="card-header">
                {{ $dokumenKurikulum->nama_kurikulum }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Nama Prodi</h5>
                <p>{{ $dokumenKurikulum->prodi->nama_prodi }}</p>
                <h5 class="card-title">Tahun Pemberlakuan</h5>
                <p>{{ $dokumenKurikulum->tahun }}</p>
                <h5 class="card-title">Semester</h5>
                <p>{{ $dokumenKurikulum->semester }}</p>
                <h5 class="card-title">Revisi Ke</h5>
                <p>{{ $dokumenKurikulum->revisi_ke }}</p>
                <h5 class="card-title">File Dokumen</h5>
                <p><a href="{{ asset('uploads/' . $dokumenKurikulum->file_dokumen) }}" target="_blank">Download</a></p>
                <h5 class="card-title">Status</h5>
                <p>{{ $dokumenKurikulum->status }}</p>            
                <a href="{{ route('dokumen_kurikulum.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
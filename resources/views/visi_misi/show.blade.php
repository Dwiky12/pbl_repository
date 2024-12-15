@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Detail Visi Misi</h1>
        <div class="card">
            <div class="card-header">
                {{ $visiMisi->prodi->nama_prodi }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Visi</h5>
                <p>{{ $visiMisi->visi }}</p>
                <h5 class="card-title">Misi</h5>
                <p>{{ $visiMisi->misi }}</p>
                <h5 class="card-title">Tahun Pemberlakuan</h5>
                <p>{{ $visiMisi->tahun_pemberlakuan }}</p>
                <h5 class="card-title">Semester Pemberlakuan</h5>
                <p>{{ $visiMisi->semester }}</p>
                <h5 class="card-title">Revisi Ke</h5>
                <p>{{ $visiMisi->revisi_ke }}</p>
                <h5 class="card-title">File Dokumen</h5>
                <p><a href="{{ asset('uploads/' . $visiMisi->file_dokumen) }}" target="_blank">Download</a></p>
                <h5 class="card-title">Status</h5>
                <p>{{ $visiMisi->status }}</p>
                <a href="{{ route('vision-mission.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection

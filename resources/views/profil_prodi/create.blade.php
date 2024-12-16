@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <h1 class="text-center">Tambah Profil Prodi</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('profil_prodi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_prodi">Nama Prodi</label>
            <select class="form-control" id="id_prodi" name="id_prodi">
                @foreach($prodi as $prods)
                <option value="{{ $prods->id }}">{{ $prods->nama_prodi }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tahun_penggunaan">Tahun Penggunaan</label>
            <input type="number" class="form-control" id="tahun_penggunaan" name="tahun_penggunaan"
                value="{{ old('tahun_penggunaan') }}">
        </div>
        <div class="form-group">
            <label for="revisi_ke">Revisi Ke</label>
            <input type="number" class="form-control" id="revisi_ke" name="revisi_ke" value="{{ old('revisi_ke') }}">
        </div>
        <div class="form-group">
            <label for="file_dokumen">File Dokumen</label>
            <input type="file" class="form-control" id="file_dokumen" name="file_dokumen">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
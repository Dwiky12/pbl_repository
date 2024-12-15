@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Edit Profil Prodi</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('profil_prodi.update', $profilProdi->id_profilprodi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="prodi">Nama Prodi</label>
                <select class="form-control" id="prodi" name="prodi">
                    @foreach($prodi as $prods)
                        <option value="{{ $prods->id_prodi }}" @if($prods->id_prodi == $profilProdi->id_prodi) selected @endif>{{ $prods->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tahun_penggunaan">Tahun Penggunaan</label>
                <input type="number" class="form-control" id="tahun_penggunaan" name="tahun_penggunaan" value="{{ $profilProdi->tahun_penggunaan }}">
            </div>
            <div class="form-group">
                <label for="revisi_ke">Revisi Ke</label>
                <input type="number" class="form-control" id="revisi_ke" name="revisi_ke" value="{{ $profilProdi->revisi_ke }}">
            </div>
            <div class="form-group">
                <label for="file_dokumen">File Dokumen</label>
                <input type="file" class="form-control" id="file_dokumen" name="file_dokumen">
                <p><a href="{{ asset('uploads/' . $profilProdi->file_dokumen) }}" target="_blank">Lihat Dokumen Saat Ini</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Edit SOP</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('sop.update', $sop->id_sop) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_prodi">Nama Prodi</label>
                <select class="form-control" id="id_prodi" name="id_prodi">
                    @foreach($prodi as $prods)
                        <option value="{{ $prods->id_prodi }}" @if($prods->id_prodi == $sop->id_prodi) selected @endif>{{ $prods->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_kategorisop">Kategori</label>
                <select class="form-control" id="id_kategorisop" name="id_kategorisop">
                    @foreach($kategoriSop as $kategori)
                        <option value="{{ $kategori->id_kategorisop }}" @if($kategori->id_kategorisop == $sop->kategori_sop_id_kategorisop) selected @endif>{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_sop">Nama SOP</label>
                <input type="text" class="form-control" id="nama_sop" name="nama_sop" value="{{ $sop->nama_sop }}">
            </div>
            <div class="form-group">
                <label for="file_dokumen">File Dokumen</label>
                <input type="file" class="form-control" id="file_dokumen" name="file_dokumen">
                <p><a href="{{ asset('uploads/' . $sop->file_dokumen) }}" target="_blank">Lihat Dokumen Saat Ini</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
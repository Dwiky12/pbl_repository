@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Tambah SOP</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('sop.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="id_prodi">Nama Prodi</label>
                <select class="form-control" id="id_prodi" name="id_prodi">
                    @foreach($prodi as $prods)
                        <option value="{{ $prods->id_prodi }}">{{ $prods->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_kategori_sop">Kategori SOP</label>
                <select class="form-control" id="id_kategori_sop" name="id_kategori_sop">
                    @foreach($kategoriSop as $kategori)
                        <option value="{{ $kategori->id_kategorisop }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_sop">Nama SOP</label>
                <input type="text" class="form-control" id="nama_sop" name="nama_sop" value="{{ old('nama_sop') }}">
            </div>
            <div class="form-group">
                <label for="file_dokumen">File Dokumen</label>
                <input type="file" class="form-control" id="file_dokumen" name="file_dokumen">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
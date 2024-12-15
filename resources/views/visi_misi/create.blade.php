@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Tambah Visi Misi</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('visi_misi.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="visi">Visi</label>
                <input type="text" class="form-control" id="visi" name="visi" value="{{ old('visi') }}">
            </div>
            <div class="form-group">
                <label for="misi">Misi</label>
                <textarea class="form-control" id="misi" name="misi" rows="5">{{ old('misi') }}</textarea>
            </div>
            <div class="form-group">
                <label for="tahun_pemberlakuan">Tahun Pemberlakuan</label>
                <input type="number" class="form-control" id="tahun_pemberlakuan" name="tahun_pemberlakuan" value="{{ old('tahun_pemberlakuan') }}">
            </div>
            <div class="form-group">
                <label for="semester">Semester Pemberlakuan</label>
                <input type="text" class="form-control" id="semester" name="semester" value="{{ old('semester') }}">
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

@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Edit Visi Misi</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('visi_misi.update', $visiMisi->id_visimisi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_prodi">Nama Prodi</label>
                <select class="form-control" id="id_prodi" name="id_prodi">
                    @foreach($prodi as $prods)
                        <option value="{{ $prods->id }}" @if($prods->id_prodi == $prods->id_prodi) selected @endif>{{ $prods->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="visi">Visi</label>
                <input type="text" class="form-control" id="visi" name="visi" value="{{ $visiMisi->visi }}">
            </div>
            <div class="form-group">
                <label for="misi">Misi</label>
                <textarea class="form-control" id="misi" name="misi" rows="5">{{ $visiMisi->misi }}</textarea>
            </div>
            <div class="form-group">
                <label for="tahun_pemberlakuan">Tahun Pemberlakuan</label>
                <input type="number" class="form-control" id="tahun_pemberlakuan" name="tahun_pemberlakuan" value="{{ $visionMission->tahun_pemberlakuan }}">
            </div>
            <div class="form-group">
                <label for="semester">Semester Pemberlakuan</label>
                <input type="text" class="form-control" id="semester" name="semester" value="{{ $visiMisi->semester }}">
            </div>
            <div class="form-group">
                <label for="revisi_ke">Revisi Ke</label>
                <input type="number" class="form-control" id="revisi_ke" name="revisi_ke" value="{{ $visiMisi->revisi_ke }}">
            </div>
            <div class="form-group">
                <label for="file_dokumen">File Dokumen</label>
                <input type="file" class="form-control" id="file_dokumen" name="file_dokumen">
                <p><a href="{{ asset('uploads/' . $visiMisi->file_dokumen) }}" target="_blank">Lihat Dokumen Saat Ini</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

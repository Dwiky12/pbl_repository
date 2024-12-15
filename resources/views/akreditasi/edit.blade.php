@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Edit Akreditasi</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('akreditasi.update', $akreditasi->id_akreditasi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_prodi">Nama Prodi</label>
                <select class="form-control" id="id_prodi" name="id_prodi">
                    @foreach($prodi as $prods)
                        <option value="{{ $prods->id_prodi }}" @if($prods->id_prodi == $akreditasi->id_prodi) selected @endif>{{ $prods->nama_prodi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="no_sk">No SK</label>
                <input type="text" class="form-control" id="no_sk" name="no_sk" value="{{ $akreditasi->no_sk }}">
            </div>
            <div class="form-group">
                <label for="id_jenisakreditasi">Jenis Akreditasi</label>
                <select class="form-control" id="id_jenisakreditasi" name="id_jenisakreditasi">
                    @foreach($jenisAkreditasi as $jenis)
                        <option value="{{ $jenis->id_jenisakreditasi }}" @if($jenis->id_jenisakreditasi == $akreditasi->id_jenisakreditasi) selected @endif>{{ $jenis->akreditasi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nilai_akreditasi">Nilai Akreditasi</label>
                <input type="text" class="form-control" id="nilai_akreditasi" name="nilai_akreditasi" value="{{ $akreditasi->nilai_akreditasi }}">
            </div>
            <div class="form-group">
                <label for="id_lembaga">Lembaga Akreditasi</label>
                <select class="form-control" id="id_lembaga" name="id_lembaga">
                    @foreach($lembaga as $lbg)
                        <option value="{{ $lbg->id_lembaga }}" @if($lbg->id_lembaga == $akreditasi->id_lembaga) selected @endif>{{ $lbg->nama_lembaga }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_tingkat">Tingkat</label>
                <select class="form-control" id="id_tingkat" name="id_tingkat">
                    @foreach($tingkat as $tk)
                        <option value="{{ $tk->id_tingkat }}" @if($tk->id_tingkat == $akreditasi->id_tingkat) selected @endif>{{ $tk->tingkatan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $akreditasi->tanggal_mulai }}">
            </div>
            <div class="form-group">
                <label for="tanggal_berakhir">Tanggal Berakhir</label>
                <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" value="{{ $akreditasi->tanggal_berakhir }}">
            </div>
            <div class="form-group">
                <label for="file_dokumen">File Dokumen</label>
                <input type="file" class="form-control" id="file_dokumen" name="file_dokumen">
                <p><a href="{{ asset('uploads/' . $akreditasi->file_dokumen) }}" target="_blank">Lihat Dokumen Saat Ini</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

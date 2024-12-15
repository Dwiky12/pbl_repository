@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Visi Misi</h1>
        <a href="{{ route('visi_misi.create') }}" class="btn btn-primary mb-3">Tambah Visi Misi</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Prodi</th>
                    <th>Visi</th>
                    <th>Misi</th>
                    <th>Tahun Pemberlakuan</th>
                    <th>Semester Pemberlakuan</th>
                    <th>Revisi Ke</th>
                    <th>File Dokumen</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visiMisi as $item)
                    <tr>
                        <td>{{ $item->prodi->nama_prodi }}</td>
                        <td>{{ $item->visi }}</td>
                        <td>{{ $item->misi }}</td>
                        <td>{{ $item->tahun_pemberlakuan }}</td>
                        <td>{{ $item->semester }}</td>
                        <td>{{ $item->revisi_ke }}</td>
                        <td><a href="{{ asset('uploads/' . $item->file_dokumen) }}" target="_blank">Download</a></td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('visi_misi.edit', $item->id_visimisi) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('visi_misi.destroy', $item->id_visimisi) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            @if(Auth::user()->role->id_role == 1)
                                <form action="{{ route('visi_misi.approve', $item->id_visimisi) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')">Approve</button>
                                </form>
                                <form action="{{ route('visi_misi.reject', $item->id_visimisi) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Reject</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

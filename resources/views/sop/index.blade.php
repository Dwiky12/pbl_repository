@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">SOP</h1>
        <a href="{{ route('sop.create') }}" class="btn btn-primary mb-3">Tambah SOP</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Prodi</th>
                    <th>Kategori</th>
                    <th>Nama SOP</th>
                    <th>File Dokumen</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sop as $item)
                    <tr>
                        <td>{{ $item->prodi->nama_prodi }}</td>
                        <td>{{ $item->kategoriSop->nama_kategori }}</td>
                        <td>{{ $item->nama_sop }}</td>
                        <td><a href="{{ asset('uploads/' . $item->file_dokumen) }}" target="_blank">Download</a></td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('sop.edit', $item->id_sop) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('sop.destroy', $item->id_sop) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            @if(Auth::user()->role->id_role == 1)
                                <form action="{{ route('sop.approve', $item->id_sop) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')">Approve</button>
                                </form>
                                <form action="{{ route('sop.reject', $item->id_sop) }}" method="POST" style="display:inline-block;">
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
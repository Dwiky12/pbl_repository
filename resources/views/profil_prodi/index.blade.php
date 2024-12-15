@extends('layouts.master')
@section('content')
        <div class="container mt-5">
            <h1 class="text-center">Profil Prodi</h1>
            <a href="{{ route('profil_prodi.create') }}" class="btn btn-primary mb-3">Tambah Profil Prodi</a>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Prodi</th>
                        <th>Tahun Penggunaan</th>
                        <th>Revisi Ke</th>
                        <th>File Dokumen</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profilProdi as $item)
                        <tr>
                            <td>{{ $item->prodi->nama_prodi }}</td>
                            <td>{{ $item->tahun_penggunaan }}</td>
                            <td>{{ $item->revisi_ke }}</td>
                            <td><a href="{{ asset('uploads/' . $item->file_dokumen) }}" target="_blank">Download</a></td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('profil_prodi.edit', $item->id_profilprodi) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('profil_prodi.destroy', $item->id_profilprodi) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                @if(Auth::user()->role->id_role == 1)
                                    <form action="{{ route('profil_prodi.approve', $item->id_profilprodi) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')">Approve</button>
                                    </form>
                                    <form action="{{ route('profil_prodi.reject', $item->id_profilprodi) }}" method="POST" style="display:inline-block;">
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

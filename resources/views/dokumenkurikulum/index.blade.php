@extends('layouts.master')
@section('content')
    
@endsection
    <div class="container mt-5">
        <h1 class="text-center">Dokumen Kurikulum</h1>
        <a href="{{ route('dokumen_kurikulum.create') }}" class="btn btn-primary mb-3">Tambah Dokumen Kurikulum</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Prodi</th>
                    <th>Nama Kurikulum</th>
                    <th>Tahun Pemberlakuan</th>
                    <th>Semester</th>
                    <th>Revisi Ke</th>
                    <th>File Dokumen</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dokumenKurikulum as $item)
                    <tr>
                        <td>{{ $item->Prodi->nama_prodi }}</td>
                        <td>{{ $item->nama_prodi }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->semester }}</td>
                        <td>{{ $item->revisi_ke }}</td>
                        <td><a href="{{ asset('uploads/' . $item->file_dokumen) }}" target="_blank">Download</a></td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('dokumen_kurikulum.edit', $item->id_dokumenkurikulum) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('dokumen_kurikulum.destroy', $item->id_dokumenkurikulum) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            @if(Auth::user()->id_role == 1)
                                <form action="{{ route('dokumen_kurikulum.approve', $item->id_dokumenkurikulum) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')">Approve</button>
                                </form>
                                <form action="{{ route('dokumen_kurikulum.reject', $item->id_dokumenkurikulum) }}" method="POST" style="display:inline-block;">
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
</body>
</html>


@extends('layouts.master')
@section('content')

<div class="container-fluid">

    <div class="container mt-5">
        <h1 class="text-center">Akreditasi</h1>
        <a href="{{ route('akreditasi.create') }}" class="btn btn-primary mb-3">Tambah Akreditasi</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Prodi</th>
                    <th>No SK</th>
                    <th>Jenis Akreditasi</th>
                    <th>Nilai Akreditasi</th>
                    <th>Lembaga</th>
                    <th>Tingkat</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>File Dokumen</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($akreditasi as $item)
                    <tr>
                        <td>{{ $item->prodi->nama_prodi }}</td>
                        <td>{{ $item->no_sk }}</td>
                        <td>{{ $item->jenisAkreditasi->akreditasi }}</td>
                        <td>{{ $item->nilai_akreditasi }}</td>
                        <td>{{ $item->lembaga->nama_lembaga }}</td>
                        <td>{{ $item->tingkat->tingkatan }}</td>
                        <td>{{ $item->tanggal_mulai }}</td>
                        <td>{{ $item->tanggal_berakhir }}</td>
                        <td><a href="{{ asset('uploads/' . $item->file_dokumen) }}" target="_blank">Download</a></td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('akreditasi.edit', $item->id_akreditasi) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('akreditasi.destroy', $item->id_akreditasi) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            @if(Auth::user()->id_role == 1) <!-- 2: Kaprodi -->
                                <form action="{{ route('akreditasi.approve', $item->id_akreditasi) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')">Approve</button>
                                </form>
                                <form action="{{ route('akreditasi.reject', $item->id_akreditasi) }}" method="POST" style="display:inline-block;">
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

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
@extends('layouts.app')

@section('title', 'batch yudisium')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Batch Yudisium</h1>
            </div>

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="section-body">
                <div class="table-responsive">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <a href="{{ route('akreditasi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                            <form action="{{ route('akreditasi.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Berdasarkan ID Akreditasi...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" style="margin-left:5px;" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Batch</th>
                                <th>Nama Mahasiswa</th>
                                <th>Tahun Angkatan</th>
                                <th>Program Studi</th>
                                <th>Status</th>
                                <th>Sks</th>
                                <th>Ipk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($batchyudisium as $item)
                                <tr>
                                    <td>{{ $item->id_batch }}</td>
                                    <td>{{ $item->nama_mhs }}</td>
                                    <td>{{ $item->tahun_angkatan}}</td>
                                    <td>{{ $item->pogram_studi }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->sks }}</td>
                                    <td>{{ $item->ipk }}</td>

                                    <td>
                                        <a href="{{ route('batchyudisium.edit', $item->id_batch) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('batchyudisium.delete', $item->id_batch) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td> <!-- Add Edit and Delete buttons for each row -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush

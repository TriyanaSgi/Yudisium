@extends('layouts.app')

@section('title', 'mahasiswa yudisium')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Mahasiswa Yudisium</h1>
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
                            <div class="d-flex align-items-center mb-3">
                                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary me-2">Tambah Data</a>
                                <form action="{{ route('mahasiswa.index') }}" method="GET" class="d-flex">
                                    <!-- Tambahkan input lain jika perlu -->
                                    <a href="{{ route('mahasiswa.verifikasi') }}" class="btn btn-primary me-2">Verifikasi Mahasiswa</a>
                                    <a href="{{ route('mahasiswa.import') }}" class="btn btn-primary me-2">Import Yudisium</a>
                                </form>
                            </div>
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Berdasarkan Nama Mahasiswa...">
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
                                <th>NIM Mahasiswa</th>
                                <th>Nama Mahasiswa</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Ipk</th>
                                <th>Jumlah Semester Aktif</th>
                                <th>Jumlah Cuti</th>
                                <th>Kode Prodi</th>
                                <th>Nama Prodi</th>
                                <th>Nama Perguruan Tinggi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $item)
                                <tr>
                                    <td>{{ $item->id_batch }}</td>
                                    <td>{{ $item->nim_mhs }}</td>
                                    <td>{{ $item->nama_mhs }}</td>
                                    <td>{{ $item->tempat_lahir}}</td>
                                    <td>{{ $item->tgl_lahir}}</td>
                                    <td>{{ $item->ipk }}</td>
                                    <td>{{ $item->jml_smstr_aktif }}</td>
                                    <td>{{ $item->jml_cuti }}</td>
                                    <td>{{ $item->kode_prodi }}</td>
                                    <td>{{ $item->nama_prodi }}</td>
                                    <td>{{ $item->nama_pt }}</td>
                                    

                                    <td>
                                        <a href="{{ route('mahasiswa.edit', $item->id_batch) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('mahasiswa.delete', $item->id_batch) }}" method="POST" style="display: inline-block;">
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

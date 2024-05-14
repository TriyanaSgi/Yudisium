@extends('layouts.app')

@section('title', 'Data Mhs')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Mahasiswa</h1>
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
                            <a href="{{ url('datamhs/data_mhs_cr') }}" class="btn btn-primary mb-3">Tambah Data</a>
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Berdasarkan Nama Prodi...">
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
                                <th>Nim Mahasiswa</th>
                                <th>Nama Mahasiswa</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Ipk</th>
                                <th>Jumlah Semester Aktif</th>
                                <th>Jumlah Semester Cuti</th>
                                <th>Kode Prodi</th>
                                <th>Nama Prodi</th>

                            </tr>
                        </thead>
                        </tbody>
                    </table>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

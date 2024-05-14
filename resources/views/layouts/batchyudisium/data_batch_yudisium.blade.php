@extends('layouts.app')

@section('title', 'Data batch yudisium')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Batch Yudisium</h1>
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
                            <a href="{{ url('batchyudisium.data_batch_yudisium') }}" class="btn btn-primary mb-3">Tambah Batch</a>
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Berdasarkan Nama ...">
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
                                <th>id Batch</th>
                                <th>Nama Mahasiswa</th>
                                <th>Tahun Angkatan</th>
                                <th>Program Studi</th>
                                <th>Status</th>
                                <th>Sks</th>
                                <th>Indeks Prestasi Kumulatif</th>

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

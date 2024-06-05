@extends('layouts.app')

@section('title', 'Verifikasi Data Mahasiswa')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Verifikasi Data Mahasiswa</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Biodata Mahasiswa</h2>
            <p class="section-lead">
                Berikut adalah biodata mahasiswa untuk verifikasi data.
            </p>

            <!-- Search Form -->
            <form action="{{ route('mahasiswa.verifikasi') }}" method="GET">
                <div class="form-group">
                    <label for="search">Cari Mahasiswa</label>
                    <input type="text" name="search" class="form-control" id="search" placeholder="Cari berdasarkan NIM atau Nama">
                </div>
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>

            @foreach($mahasiswa as $mhs)
            <div class="row mt-4">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi Dasar</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Nama:</strong> {{ $mhs->nama_mhs }}</p>
                            <p><strong>NIM:</strong> {{ $mhs->nim_mhs }}</p>
                            <p><strong>Perguruan Tinggi:</strong> {{ $mhs->nama_pt }} </p>
                            <p><strong>Program Studi:</strong> {{ $mhs->nama_prodi }}</p>
                            <p><strong>Semester:</strong> {{ $mhs->jml_smstr_aktif }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Status Kuliah</h4>
                        </div>
                        <div class="card-body">
                            <ul>
                                <!-- Example static data -->
                                <li><strong>Status:</strong> {{ $mhs->batch->status  ?? 'status tidak ditemukan'}} </li>
                                <!-- You can add dynamic data here if available -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Riwayat Studi</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode Mata Kuliah</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Semester</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Example static data -->
                                    <tr>
                                        <td>TI101</td>
                                        <td>Pemrograman Dasar</td>
                                        <td>1</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>TI102</td>
                                        <td>Matematika Diskrit</td>
                                        <td>1</td>
                                        <td>B+</td>
                                    </tr>
                                    <!-- You can add dynamic data here if available -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush

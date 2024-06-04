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

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi Dasar</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Nama:</strong> John Doe</p>
                            <p><strong>NIM:</strong> 123456789</p>
                            <p><strong>Fakultas:</strong> Teknik</p>
                            <p><strong>Program Studi:</strong> Teknik Informatika</p>
                            <p><strong>Semester:</strong> 6</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Riwayat Status Kuliah</h4>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li><strong>2020/2021:</strong> Aktif</li>
                                <li><strong>2019/2020:</strong> Cuti</li>
                                <li><strong>2018/2019:</strong> Aktif</li>
                                <!-- Tambahkan status lainnya sesuai data -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
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
                                    <!-- Tambahkan riwayat studi lainnya sesuai data -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush

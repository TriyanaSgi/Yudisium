@extends('layouts.app')

@section('title', 'Tambah Data Mahasiswa')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Mahasiswa Yudisium</h1>
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

                    <div class="form-group">
                        <label for="nama_prodi">NIM Mahasiswa</label>
                        <input type="number" name="nama_prodi" id="nama_prodi" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="wilayah">Nama Mahasiswa</label>
                        <input type="text" name="wilayah" id="wilayah" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama_kaprodi">Tempat Lahir</label>
                        <input type="text" name="nama_kaprodi" id="nama_kaprodi" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tgl_sk_prodi">Tanggal Lahir</label>
                        <input type="date" name="tgl_sk_prodi" id="tgl_sk_prodi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tgl_penetapan_akreditasi">Ipk</label>
                        <input type="number" name="tgl_penetapan_akreditasi" id="tgl_penetapan_akreditasi" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tgl_penetapan_akreditasi">Jumlah Semester Aktif</label>
                        <input type="number" name="tgl_penetapan_akreditasi" id="tgl_penetapan_akreditasi" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_dosen">Jumlah Semester Cuti</label>
                        <input type="number" name="jumlah_semester" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_mahasiswa">Kode Prodi</label>
                        <input type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_mahasiswa">Nama Prodi</label>
                        <input type="text" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_mahasiswa">Asal Perguruan Tinggi</label>
                        <input type="text" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="form-control">
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush

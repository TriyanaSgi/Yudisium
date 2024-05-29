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
                        <label for="id_batch">ID Batch</label>
                        <input type="number" name="id_batch" id="id_batch" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nim_mhs">NIM Mahasiswa</label>
                        <input type="number" name="nim_mhs" id="nim_mhs" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" id="nama_mhs" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="ipk">Ipk</label>
                        <input type="number" name="ipk" id="ipk" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jml_smstr_aktif">Jumlah Semester Aktif</label>
                        <input type="number" name="jml_smstr_aktif" id="jml_smstr_aktif" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="jml_cuti">Jumlah Semester Cuti</label>
                        <input type="number" name="jml_cuti" id="jml_cuti" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="kode_prodi">Kode Prodi</label>
                        <input type="number" name="kode_prodi" id="kode_prodi" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama_prodi">Nama Prodi</label>
                        <input type="text" name="nama_prodi" id="nama_prodi" class="form-control">
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

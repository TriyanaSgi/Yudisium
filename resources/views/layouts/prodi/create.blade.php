@extends('layouts.app')

@section('title', 'Tambah Data Prodi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Prodi</h1>
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
                        <label for="nama_prodi">Nama prodi</label>
                        <input type="text" name="nama_prodi" id="nama_prodi" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="wilayah">Kode Prodi</label>
                        <input type="number" name="wilayah" id="wilayah" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama_kaprodi">Email</label>
                        <input type="text" name="nama_kaprodi" id="nama_kaprodi" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tgl_sk_prodi">Nama Perguruan Tinggi</label>
                        <input type="text" name="tgl_sk_prodi" id="tgl_sk_prodi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tgl_penetapan_akreditasi">Kode Perguruan Tinggi</label>
                        <input type="number" name="tgl_penetapan_akreditasi" id="tgl_penetapan_akreditasi" class="form-control">
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

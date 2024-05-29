@extends('layouts.app')

@section('title', 'Batch Yudisium')

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
            <form action="{{ route('batch.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_batch">Id Batch</label>
                        <input type="number" name="id_batch" id="id_batch" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" id="nama_mhs" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tahun_angkatan">Tahun Angkatan</label>
                        <input type="number" name="tahun_angkatan" id="tahun_angkatan" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="program_studi">Program Studi</label>
                        <input type="text" name="program_studi" id="program_studi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="number" name="sks" id="sks" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ipk">Indeks Prestasi Kumulatif</label>
                        <input type="number" name="ipk" id="ipk" class="form-control">
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

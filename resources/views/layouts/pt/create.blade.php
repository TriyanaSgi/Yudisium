@extends('layouts.app')

@section('title', 'Tambah Data Perguruan Tinggi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Perguruan Tinggi</h1>
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
            <form action="{{ route('pt.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_pt">Kode Perguruan Tinggi</label>
                        <input type="number" name="kode_pt" id="kode_pt" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nama_pt">Nama Perguruan Tinggi</label>
                        <input type="text" name="nama_pt" id="nama_pt" class="form-control">
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

@extends('layouts.app')

@section('title', 'Data Prodi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Prodi</h1>
            </div>
            <form action="{{ route('prodi.update', $data_prodi->kode_prodi) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_prodi">Nama Prodi</label>
                    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="{{ $data_prodi->nama_prodi }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="kode_prodi">Kode Prodi</label>
                    <input type="int" name="kode_pt" id="kode_pt" class="form-control" value="{{ $data_prodi->kode_prodi }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="kode_pt">Kode PT</label>
                    <input type="int" name="kode_pt" id="kode_pt" class="form-control" value="{{ $data_prodi->kode_pt }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="nama_pt">Nama PT</label>
                    <input type="text" name="nama_pt" id="nama_pt" class="form-control" value="{{ $data_prodi->nama_pt }}" maxlength="255">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
</div>
@endsection

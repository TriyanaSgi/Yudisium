@extends('layouts.app')

@section('title', 'Edit Data Batch Yudisium')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Batch Yudisium</h1>
        </div>
        <form action="{{ route('batch.update', $batch->id_batch) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="id_batch">Id Batch</label>
                    <input type="number" name="id_batch" id="id_batch" class="form-control" value="{{ $batch->id_batch }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="nama_mhs">Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" id="nama_mhs" class="form-control" value="{{ $batch->nama_mhs }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="tahun_angkatan">Tahun Angkatan</label>
                    <input type="number" name="tahun_angkatan" id="tahun_angkatan" class="form-control" value="{{ $batch->tahun_angkatan }}">
                </div>

                <div class="form-group">
                    <label for="program_studi">Program Studi</label>
                    <input type="text" name="program_studi" id="program_studi" class="form-control" value="{{ $batch->program_studi }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control" value="{{ $batch->status }}">
                </div>

                <div class="form-group">
                    <label for="sks">Jumlah Sks</label>
                    <input type="number" name="sks" id="sks" class="form-control" value="{{ $batch->sks }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="ipk">Indeks Prestasi Kumulatif</label>
                    <input type="number" name="ipk" id="ipk" class="form-control" value="{{ $batch->ipk }}" min="0" max="11">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
</div>
@endsection

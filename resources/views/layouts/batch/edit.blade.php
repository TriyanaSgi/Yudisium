@extends('layouts.app')

@section('title', 'Edit Batch')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Batch</h1>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="section-body">
                <form action="{{ route('batch.update', $batch->id_batch) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_batch">ID Batch</label>
                        <input type="text" name="id_batch" class="form-control" value="{{ $batch->id_batch }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" class="form-control" value="{{ $batch->nama_mhs }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun_angkatan">Tahun Angkatan</label>
                        <input type="text" name="tahun_angkatan" class="form-control" value="{{ $batch->tahun_angkatan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="program_studi">Program Studi</label>
                        <input type="text" name="program_studi" class="form-control" value="{{ $batch->program_studi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="text" name="sks" class="form-control" value="{{ $batch->sks }}" required>
                    </div>
                    <div class="form-group">
                        <label for="ipk">IPK</label>
                        <input type="text" name="ipk" class="form-control" value="{{ $batch->ipk }}" required>
                    </div>
                    <div class="form-group">
                        <label for="upload">Upload File</label>
                        <input type="file" name="upload" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>
    </div>
@endsection

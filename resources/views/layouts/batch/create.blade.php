@extends('layouts.app')

@section('title', 'Tambah Batch')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Batch</h1>
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
                <form action="{{ route('batch.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_batch">ID Batch</label>
                        <input type="text" name="id_batch" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_mhs">Nama Mahasiswa</label>
                        <input type="text" name="nama_mhs" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tahun_angkatan">Tahun Angkatan</label>
                        <input type="text" name="tahun_angkatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="program_studi">Program Studi</label>
                        <input type="text" name="program_studi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="text" name="sks" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ipk">IPK</label>
                        <input type="text" name="ipk" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="upload">Upload File</label>
                        <input type="file" name="upload" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>
    </div>
@endsection

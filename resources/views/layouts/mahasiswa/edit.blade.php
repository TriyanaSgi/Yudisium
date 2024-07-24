@extends('layouts.app')

@section('title', 'Data Mhs')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Mahasiswa</h1>
            </div>
            <form action="{{ route('mahasiswa.update', $mahasiswa->id_batch) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_batch">ID Batch</label>
                    <input type="text" name="id_batch" id="id_batch" class="form-control" value="{{ $mahasiswa->id_batch }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="nim_mhs">NIM Mahasiswa</label>
                    <input type="number" name="nim_mhs" id="nim_mhs" class="form-control" value="{{ $mahasiswa->nim_mhs }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="nama_mhs">Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" id="nama_mhs" class="form-control" value="{{ $mahasiswa->nama_mhs }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ $mahasiswa->tempat_lahir }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ $mahasiswa->tgl_lahir }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="ipk">IPK</label>
                    <input type="varchar" name="ipk" id="ipk" class="form-control" value="{{ $mahasiswa->ipk }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="jml_smstr_aktif">Jumlah Semester Aktif</label>
                    <input type="number" name="jml_smstr_aktif" id="jml_smstr_aktif" class="form-control" value="{{ $mahasiswa->jml_smstr_aktif }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="jml_cuti">Jumlah Cuti</label>
                    <input type="text" name="jml_cuti" id="jml_cuti" class="form-control" value="{{ $mahasiswa->jml_cuti }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="kode_prodi">Kode Prodi</label>
                    <input type="number" name="kode_prodi" id="kode_prodi" class="form-control" value="{{ $mahasiswa->kode_prodi }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="nama_prodi">Nama Prodi</label>
                    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="{{ $mahasiswa->nama_prodi }}" maxlength="255">
                </div>

                <div class="form-group">
                    <label for="nama_pt">Nama Perguruan Tinggi</label>
                    <input type="text" name="nama_pt" id="nama_pt" class="form-control" value="{{ $mahasiswa->nama_pt }}" maxlength="255">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Edit Data Hak Akses')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Hak Akses</h1>
        </div>
        <div class="section-body">
            <form action="{{ route('hakakses.update', $hakakses->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="role">Hak Akses</label>
                    <select name="role" id="role" class="form-control">
                        <option value="" disabled selected>Pilih Hak Akses</option>
                        <option value="superadmin" {{ $hakakses->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                        <option value="mahasiswa" {{ $hakakses->role == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                        <option value="pt" {{ $hakakses->role == 'pt' ? 'selected' : '' }}>PT</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush

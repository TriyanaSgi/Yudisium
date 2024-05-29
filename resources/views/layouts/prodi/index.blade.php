@extends('layouts.app')

@section('title', 'Prodi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Prodi</h1>
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
                <div class="table-responsive">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <a href="{{ route('prodi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                            <form action="{{ route('prodi.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Berdasarkan ID Prodi...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" style="margin-left:5px;" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Prodi</th>
                                <th>Kode Prodi</th>
                                <th>Kode PT</th>
                                <th>Nama PT</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_prodi as $item)
                                <tr>
                                    <td>{{ $item->nama_prodi }}</td>
                                    <td>{{ $item->kode_prodi }}</td>
                                    <td>{{ $item->kode_pt }}</td>
                                    <td>{{ $item->nama_pt }}</td>
                                    
                                    <td>
                                        <a href="{{ route('prodi.edit', $item->kode_prodi) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('prodi.delete', $item->kode_prodi) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td> <!-- Add Edit and Delete buttons for each row -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush

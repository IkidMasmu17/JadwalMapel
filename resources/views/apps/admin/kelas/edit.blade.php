@extends('layouts.app')

@section('title-page')
    Ubah Kelas
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.kelas') }}">Kelas</a></li>
        <li class="breadcrumb-item active">Ubah</li>
    </ol>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-dark font-weight-bold">
                        <i class="fas fa-edit text-warning mr-2"></i>Ubah Data Kelas
                    </h5>
                </div>
                <form action="{{ route('admin.kelas.update') }}" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="id" value="{{ $kelas->id }}">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="nama" class="text-muted small font-weight-bold text-uppercase">Nama Kelas</label>
                            <input type="text" name="nama" class="form-control border-0 bg-light shadow-none py-4"
                                value="{{ $kelas->nama }}" id="nama" placeholder="Masukkan nama kelas..." required>
                        </div>

                        <div class="form-group">
                            <label for="tingkat_id" class="text-muted small font-weight-bold text-uppercase">Tingkat</label>
                            <select name="tingkat_id" id="tingkat_id"
                                class="form-control border-0 bg-light shadow-none custom-select" required>
                                @foreach ($tingkat as $item)
                                    <option value="{{ $item->id }}" {{ $kelas->tingkat_id == $item->id ? 'selected' : '' }}>
                                        Tingkat {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted mt-2 d-block">Terakhir diperbarui:
                                {{ $kelas->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-top-0 d-flex justify-content-between py-3">
                        <a href="{{ route('admin.kelas') }}" class="btn btn-light px-4">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-warning px-4 text-white font-weight-bold shadow-sm">
                            <i class="fas fa-sync-alt mr-1"></i> Perbarui Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .card {
            border-radius: 12px;
        }

        .card-header {
            border-top-left-radius: 12px !important;
            border-top-right-radius: 12px !important;
        }

        .form-control,
        .custom-select {
            border-radius: 8px;
            height: auto !important;
        }

        .form-control:focus,
        .custom-select:focus {
            background-color: #fff !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.1) !important;
            border: 1px solid #ffc107 !important;
        }

        .custom-select {
            padding: 0.75rem 1.25rem;
        }
    </style>
@endsection
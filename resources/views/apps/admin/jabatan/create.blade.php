@extends('layouts.app')

@section('title-page')
    Tambah Jabatan
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.jabatan') }}">Jabatan</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-dark font-weight-bold">
                        <i class="fas fa-plus-circle text-primary mr-2"></i>Tambah Jabatan Baru
                    </h5>
                </div>
                <form action="{{ route('admin.jabatan.store') }}" method="POST">
                    @csrf @method('POST')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="text-muted small font-weight-bold text-uppercase">Nama Jabatan</label>
                            <input type="text" name="name" class="form-control border-0 bg-light shadow-none py-4" id="name"
                                placeholder="Masukkan nama jabatan..." required autofocus>
                            <small class="text-muted mt-2 d-block">Contoh: Kepala Sekolah, Guru Mata Pelajaran, dll.</small>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-top-0 d-flex justify-content-between py-3">
                        <a href="{{ route('admin.jabatan') }}" class="btn btn-light px-4">
                            <i class="fas fa-arrow-left mr-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm">
                            <i class="fas fa-save mr-1"></i> Simpan Data
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

        .form-control {
            border-radius: 8px;
        }

        .form-control:focus {
            background-color: #fff !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1) !important;
            border: 1px solid #007bff !important;
        }
    </style>
@endsection
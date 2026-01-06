@extends('layouts.app')

@section('title-page')
    Pengaturan Sekolah
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item active">Pengaturan Sekolah</li>
    </ol>
@endsection

@section('content')
    @if(Session::has('flash_message'))
        <script type="text/javascript">
            Swal.fire({
                title: "Berhasil!",
                text: "{{ Session('flash_message') }}",
                icon: "success",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-dark font-weight-bold">
                        <i class="fas fa-school text-primary mr-2"></i>Informasi Tahun Ajaran
                    </h5>
                </div>
                <form action="{{ route('admin.sekolah.update') }}" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="id" value="{{ $sekolah->id }}">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label for="tahun_ajaran" class="text-muted small font-weight-bold text-uppercase">Tahun
                                Ajaran</label>
                            <input type="text" name="tahun_ajaran" class="form-control border-0 bg-light shadow-none py-4"
                                value="{{ $sekolah->tahun_ajaran }}" id="tahun_ajaran" placeholder="Contoh: 2023/2024"
                                required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="semester" class="text-muted small font-weight-bold text-uppercase">Semester</label>
                            <input type="text" name="semester" class="form-control border-0 bg-light shadow-none py-4"
                                value="{{ $sekolah->semester }}" id="semester" placeholder="Contoh: Ganjil" required>
                            <small class="text-muted mt-2 d-block font-italic">Terakhir diperbarui:
                                {{ $sekolah->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-top-0 d-flex justify-content-between py-3">
                        <a href="{{ route('admin./') }}" class="btn btn-light px-4">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm">
                            <i class="fas fa-save mr-1"></i> Simpan Pengaturan
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
            font-weight: 500;
        }

        .form-control:focus {
            background-color: #fff !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1) !important;
            border: 1px solid #007bff !important;
        }
    </style>
@endsection
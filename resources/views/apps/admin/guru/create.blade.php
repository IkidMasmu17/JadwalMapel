@extends('layouts.app')

@section('title-page')
    Tambah Guru
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.guru') }}">Guru</a></li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('admin.guru.store') }}" method="POST">
                @csrf @method('POST')
                <div class="row">
                    <!-- Personal Information -->
                    <div class="col-md-7">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 text-dark font-weight-bold">
                                    <i class="fas fa-user text-primary mr-2"></i>Informasi Pribadi
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-muted small font-weight-bold text-uppercase">Inisial</label>
                                            <input type="text" name="inisial"
                                                class="form-control border-0 bg-light shadow-none" placeholder="Cth: AR"
                                                required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="text-muted small font-weight-bold text-uppercase">NIP</label>
                                            <input type="text" name="nip" class="form-control border-0 bg-light shadow-none"
                                                placeholder="Nomor Induk Pegawai" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="text-muted small font-weight-bold text-uppercase">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control border-0 bg-light shadow-none"
                                        placeholder="Masukkan nama lengkap guru..." required>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="text-muted small font-weight-bold text-uppercase">Alamat</label>
                                    <textarea name="alamat" class="form-control border-0 bg-light shadow-none" rows="2"
                                        placeholder="Alamat lengkap..." required></textarea>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-muted small font-weight-bold text-uppercase">No HP</label>
                                            <input type="text" name="no_hp"
                                                class="form-control border-0 bg-light shadow-none" placeholder="08..."
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-muted small font-weight-bold text-uppercase">Agama</label>
                                            <select name="agama"
                                                class="form-control border-0 bg-light shadow-none custom-select" required>
                                                <option value="" disabled selected>- Pilih -</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Khatolik">Kristen Khatolik</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindhu">Hindhu</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Information -->
                    <div class="col-md-5">
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 text-dark font-weight-bold">
                                    <i class="fas fa-lock text-info mr-2"></i>Akses Sistem
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="text-muted small font-weight-bold text-uppercase">Jabatan</label>
                                    <select name="jabatan_id"
                                        class="form-control border-0 bg-light shadow-none custom-select" required>
                                        <option value="" disabled selected>- Pilih Jabatan -</option>
                                        @foreach ($jabatan as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="text-muted small font-weight-bold text-uppercase">Email</label>
                                    <input type="email" name="email" class="form-control border-0 bg-light shadow-none"
                                        placeholder="email@sekolah.com" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="text-muted small font-weight-bold text-uppercase">Password</label>
                                    <input type="password" name="password"
                                        class="form-control border-0 bg-light shadow-none" placeholder="Minimal 8 karakter"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm">
                            <div class="card-body py-3 d-flex justify-content-between">
                                <a href="{{ route('admin.guru') }}" class="btn btn-light px-4">
                                    <i class="fas fa-arrow-left mr-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                    <i class="fas fa-save mr-1"></i> Simpan Guru
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
            padding: 12px 15px;
            height: auto !important;
        }

        .form-control:focus,
        .custom-select:focus {
            background-color: #fff !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1) !important;
            border: 1px solid #007bff !important;
        }

        .custom-select {
            padding-right: 30px;
        }
    </style>
@endsection
@extends('layouts.app')

@section('title-page')
    Ubah Guru
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.guru') }}">Guru</a></li>
        <li class="breadcrumb-item active">Ubah</li>
    </ol>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('admin.guru.store') }}" method="POST">
                <input type="hidden" name="id" value="{{ $guru->id }}">
                @csrf @method('PUT')
                <div class="row">
                    <!-- Personal Information -->
                    <div class="col-md-7">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 text-dark font-weight-bold">
                                    <i class="fas fa-user-edit text-warning mr-2"></i>Ubah Informasi Pribadi
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-muted small font-weight-bold text-uppercase">Inisial</label>
                                            <input type="text" name="inisial" value="{{ $guru->inisial }}"
                                                class="form-control border-0 bg-light shadow-none" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="text-muted small font-weight-bold text-uppercase">NIP</label>
                                            <input type="text" name="nip" value="{{ $guru->nip }}"
                                                class="form-control border-0 bg-light shadow-none" readonly>
                                            <small class="text-muted">NIP tidak dapat diubah</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="text-muted small font-weight-bold text-uppercase">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ $guru->nama }}"
                                        class="form-control border-0 bg-light shadow-none" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="text-muted small font-weight-bold text-uppercase">Alamat</label>
                                    <textarea name="alamat" class="form-control border-0 bg-light shadow-none" rows="2"
                                        required>{{ $guru->alamat }}</textarea>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-muted small font-weight-bold text-uppercase">No HP</label>
                                            <input type="text" name="no_hp" value="{{ $guru->no_hp }}"
                                                class="form-control border-0 bg-light shadow-none" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-muted small font-weight-bold text-uppercase">Agama</label>
                                            <select name="agama"
                                                class="form-control border-0 bg-light shadow-none custom-select" required>
                                                @foreach(['Islam', 'Kristen Khatolik', 'Kristen Protestan', 'Budha', 'Hindhu', 'Lainnya'] as $agama)
                                                    <option value="{{ $agama }}" {{ $guru->agama == $agama ? 'selected' : '' }}>
                                                        {{ $agama }}</option>
                                                @endforeach
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
                                    <i class="fas fa-briefcase text-info mr-2"></i>Akses & Jabatan
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="text-muted small font-weight-bold text-uppercase">Jabatan</label>
                                    <select name="jabatan_id"
                                        class="form-control border-0 bg-light shadow-none custom-select" required>
                                        @foreach ($jabatan as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $guru->jabatan_id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-4 p-3 bg-light rounded" style="border-left: 4px solid #17a2b8;">
                                    <p class="small text-muted mb-0"><i class="fas fa-info-circle mr-1"></i> Terakhir
                                        diperbarui:</p>
                                    <p class="font-weight-bold mb-0">{{ $guru->updated_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm">
                            <div class="card-body py-3 d-flex justify-content-between">
                                <a href="{{ route('admin.guru') }}" class="btn btn-light px-4">
                                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-warning px-4 text-white font-weight-bold shadow-sm">
                                    <i class="fas fa-sync-alt mr-1"></i> Perbarui Guru
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
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.1) !important;
            border: 1px solid #ffc107 !important;
        }

        .custom-select {
            padding-right: 30px;
        }
    </style>
@endsection
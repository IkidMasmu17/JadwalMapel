@extends('layouts.app')

@section('title-page')
    Ubah Siswa
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.siswa') }}">Siswa</a></li>
        <li class="breadcrumb-item active">Ubah</li>
    </ol>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('admin.siswa.update') }}" method="POST">
                <input type="hidden" name="id" value="{{ $siswa->id }}">
                @csrf @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 text-dark font-weight-bold">
                                    <i class="fas fa-user-edit text-warning mr-2"></i>Ubah Informasi Siswa
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-4">
                                            <label class="text-muted small font-weight-bold text-uppercase">NISN</label>
                                            <input type="text" name="nisn" value="{{ $siswa->nisn }}"
                                                class="form-control border-0 bg-light shadow-none py-4" readonly>
                                            <small class="text-muted">NISN tidak dapat diubah</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-muted small font-weight-bold text-uppercase">Nama Lengkap</label>
                                    <input type="text" name="nama" value="{{ $siswa->nama }}"
                                        class="form-control border-0 bg-light shadow-none py-4" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="text-muted small font-weight-bold text-uppercase">Alamat</label>
                                    <textarea name="alamat" class="form-control border-0 bg-light shadow-none py-4" rows="2"
                                        required>{{ $siswa->alamat }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="text-muted small font-weight-bold text-uppercase">No HP</label>
                                            <input type="text" name="no_hp" value="{{ $siswa->no_hp }}"
                                                class="form-control border-0 bg-light shadow-none py-4" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label class="text-muted small font-weight-bold text-uppercase">Agama</label>
                                            <select name="agama"
                                                class="form-control border-0 bg-light shadow-none custom-select" required>
                                                @foreach(['Islam', 'Kristen Khatolik', 'Kristen Protestan', 'Budha', 'Hindhu', 'Lainnya'] as $agama)
                                                    <option value="{{ $agama }}" {{ $siswa->agama == $agama ? 'selected' : '' }}>
                                                        {{ $agama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2 p-3 bg-light rounded" style="border-left: 4px solid #ffc107;">
                                    <p class="small text-muted mb-0"><i class="fas fa-info-circle mr-1"></i> Terakhir
                                        diperbarui:</p>
                                    <p class="font-weight-bold mb-0 small text-dark">
                                        {{ $siswa->updated_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            <div class="card-footer bg-white border-top-0 d-flex justify-content-between py-3">
                                <a href="{{ route('admin.siswa') }}" class="btn btn-light px-4">
                                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-warning px-4 text-white font-weight-bold shadow-sm">
                                    <i class="fas fa-sync-alt mr-1"></i> Perbarui Siswa
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
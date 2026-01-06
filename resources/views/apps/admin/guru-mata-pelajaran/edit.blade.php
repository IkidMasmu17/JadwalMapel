@extends('layouts.app')

@section('title-page')
    Ubah Guru Mata Pelajaran
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.mata_pelajaran') }}">Mata Pelajaran</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.mata_pelajaran.guru_mapel', $mata_pelajaran->id) }}">Guru
                Mapel</a></li>
        <li class="breadcrumb-item active">Ubah</li>
    </ol>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-dark font-weight-bold">
                        <i class="fas fa-edit text-warning mr-2"></i>Ubah Penugasan Pengajar
                    </h5>
                </div>
                <form action="{{ route('admin.mata_pelajaran.guru_mapel.update') }}" method="POST">
                    @csrf @method('PUT')
                    <input type="hidden" name="id" value="{{ $guru_mata_pelajaran->id }}">
                    <input type="hidden" name="mata_pelajaran_id" value="{{ $guru_mata_pelajaran->mata_pelajaran_id }}">
                    <div class="card-body">
                        <div class="alert alert-light border shadow-none mb-4" style="border-radius: 10px;">
                            <small class="text-muted d-block text-uppercase font-weight-bold mb-1">Mata Pelajaran:</small>
                            <h6 class="mb-0 font-weight-bold text-dark">{{ $mata_pelajaran->nama }}</h6>
                        </div>

                        <div class="form-group mb-4">
                            <label for="kelas_id" class="text-muted small font-weight-bold text-uppercase">Penempatan
                                Kelas</label>
                            <select name="kelas_id" id="kelas_id"
                                class="form-control border-0 bg-light shadow-none custom-select" required>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}" {{ $guru_mata_pelajaran->kelas_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }} - Tingkat {{ $item->tingkat->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="guru_id" class="text-muted small font-weight-bold text-uppercase">Guru Mata
                                Pelajaran</label>
                            <select name="guru_id" id="guru_id"
                                class="form-control border-0 bg-light shadow-none custom-select" required>
                                @foreach ($guru as $item)
                                    <option value="{{ $item->id }}" {{ $guru_mata_pelajaran->guru_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->nip }} - {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted mt-2 d-block">Terakhir diperbarui:
                                {{ $guru_mata_pelajaran->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>

                    <div class="card-footer bg-white border-top-0 d-flex justify-content-between py-3">
                        <a href="{{ route('admin.mata_pelajaran.guru_mapel', $mata_pelajaran->id) }}"
                            class="btn btn-light px-4">
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
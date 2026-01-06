@extends('layouts.app')

@section('title-page')
    Jadwal Pelajaran
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('guru./') }}">Beranda</a></li>
        <li class="breadcrumb-item active">Jadwal Pelajaran</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <!-- Filter Section -->
        <div class="col-md-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 text-dark font-weight-bold">
                        <i class="fas fa-filter text-primary mr-2"></i>Filter Jadwal Per Rombel
                    </h6>
                </div>
                <form action="{{ route('guru.jadwal_pelajaran') }}" method="GET">
                    <div class="card-body">
                        <div class="row align-items-end">
                            <div class="col-md-9">
                                <div class="form-group mb-0">
                                    <label class="text-muted small font-weight-bold text-uppercase">Pilih Rombongan
                                        Belajar</label>
                                    <select name="q_rombel" class="form-control border-0 bg-light shadow-none custom-select"
                                        required>
                                        <option value="" disabled selected>- Pilih Rombel -</option>
                                        @foreach ($rombel as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $q_rombel ? 'selected' : '' }}>
                                                {{ $item->kelas->nama }} (Tingkat {{ $item->kelas->tingkat->nama }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary btn-block shadow-sm">
                                    <i class="fas fa-search mr-1"></i> Tampilkan Jadwal
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Daily Breakdown Section -->
        <div class="col-md-12">
            <div class="row">
                @include('apps.admin.jadwal-pelajaran.components.senin', ['jadwal_pelajaran_senin' => $jadwal_pelajaran_senin])
                @include('apps.admin.jadwal-pelajaran.components.selasa', ['jadwal_pelajaran_selasa' => $jadwal_pelajaran_selasa])
                @include('apps.admin.jadwal-pelajaran.components.rabu', ['jadwal_pelajaran_rabu' => $jadwal_pelajaran_rabu])
                @include('apps.admin.jadwal-pelajaran.components.kamis', ['jadwal_pelajaran_kamis' => $jadwal_pelajaran_kamis])
                @include('apps.admin.jadwal-pelajaran.components.jumat', ['jadwal_pelajaran_jumat' => $jadwal_pelajaran_jumat])
                @include('apps.admin.jadwal-pelajaran.components.sabtu', ['jadwal_pelajaran_sabtu' => $jadwal_pelajaran_sabtu])
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

        .custom-select {
            border-radius: 8px;
            height: auto !important;
            padding: 0.75rem 1.25rem;
            font-size: 14px;
        }

        .custom-select:focus {
            background-color: #fff !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1) !important;
            border: 1px solid #007bff !important;
        }

        .btn-primary {
            border-radius: 8px;
            padding: 0.75rem 1.25rem;
            font-weight: 600;
        }
    </style>
@endsection
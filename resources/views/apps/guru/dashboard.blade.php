@extends('layouts.app')

@section('title-page')
    Dashboard
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('guru./') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
@endsection

@section('content')
    {{-- Welcome Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient-info text-white shadow-lg">
                <div class="card-body py-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2"><i class="fas fa-chalkboard-teacher mr-2"></i>Selamat Datang, Guru!</h2>
                            <p class="mb-0 opacity-75">Kelola jadwal mengajar dan pantau kelas Anda</p>
                            <small class="opacity-75"><i class="far fa-calendar mr-1"></i>{{ date('l, d F Y') }}</small>
                        </div>
                        <div class="col-md-4 text-right d-none d-md-block">
                            <i class="fas fa-book-reader fa-5x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="row mb-4">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <div class="card border-left-success shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Siswa
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $siswa }}</div>
                            <small class="text-muted">Peserta didik aktif</small>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-success text-white">
                                <i class="fas fa-user-graduate fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <div class="card border-left-danger shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Kelas
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $kelas }}</div>
                            <small class="text-muted">Kelas yang diampu</small>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-danger text-white">
                                <i class="fas fa-door-open fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Today's Teaching Schedule --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-calendar-check text-info mr-2"></i>
                            Jadwal Mengajar Hari Ini
                        </h5>
                        <span class="badge badge-info badge-pill">{{ date('d F Y') }}</span>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($jadwal_pelajaran) == 0)
                        <div class="text-center py-5">
                            <i class="fas fa-mug-hot fa-4x text-muted mb-3"></i>
                            <h5 class="text-muted">Tidak ada jadwal mengajar hari ini</h5>
                            <p class="text-muted">Anda bisa beristirahat atau mempersiapkan materi untuk hari lainnya</p>
                        </div>
                    @else
                        <div class="row">
                            @foreach ($jadwal_pelajaran as $index => $data_jadwal_pelajaran)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card border-left-info h-100 hover-shadow">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <span class="badge badge-info mb-2">Les
                                                    {{ $data_jadwal_pelajaran->jamPelajaran->les_ke }}</span>
                                                <span
                                                    class="badge badge-outline-info">{{ $data_jadwal_pelajaran->rombel->kelas->nama }}</span>
                                            </div>
                                            <h6 class="font-weight-bold mb-1">
                                                {{ $data_jadwal_pelajaran->guruMataPelajaran->mataPelajaran->nama }}</h6>
                                            <p class="text-muted small mb-2">
                                                <i
                                                    class="fas fa-user-tie mr-1"></i>{{ $data_jadwal_pelajaran->guruMataPelajaran->guru->inisial }}
                                            </p>
                                            <div class="mt-3 pt-2 border-top">
                                                <i class="far fa-clock text-muted mr-1"></i>
                                                <span class="font-weight-medium">
                                                    {{ $data_jadwal_pelajaran->jamPelajaran->jam_mulai }} -
                                                    {{ $data_jadwal_pelajaran->jamPelajaran->jam_selesai }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <style>
        .border-left-success {
            border-left: 4px solid #28a745 !important;
        }

        .border-left-danger {
            border-left: 4px solid #dc3545 !important;
        }

        .border-left-info {
            border-left: 4px solid #17a2b8 !important;
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .opacity-75 {
            opacity: 0.75;
        }

        .opacity-50 {
            opacity: 0.5;
        }

        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }

        .bg-gradient-info {
            background: linear-gradient(87deg, #17a2b8 0, #138496 100%);
        }

        .hover-shadow {
            transition: all 0.3s ease;
        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .badge-outline-info {
            color: #17a2b8;
            background-color: transparent;
            border: 1px solid #17a2b8;
        }
    </style>
@endsection
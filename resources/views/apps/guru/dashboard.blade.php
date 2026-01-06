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
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body py-4">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h2 class="mb-2 text-info">
                                <i class="fas fa-chalkboard-teacher mr-2"></i>Selamat Datang, Guru!
                            </h2>
                            <p class="mb-1 text-muted">Kelola jadwal mengajar dan pantau kelas Anda</p>
                            <small class="text-muted"><i class="far fa-calendar mr-1"></i>{{ date('l, d F Y') }}</small>
                        </div>
                        <div class="col-md-3 text-right d-none d-md-block">
                            <i class="fas fa-book-reader fa-4x text-info" style="opacity: 0.2;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="row mb-4">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Siswa
                            </div>
                            <div class="h2 mb-0 font-weight-bold text-dark">{{ $siswa }}</div>
                            <small class="text-muted">Peserta didik aktif</small>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle-light bg-success">
                                <i class="fas fa-user-graduate fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Kelas
                            </div>
                            <div class="h2 mb-0 font-weight-bold text-dark">{{ $kelas }}</div>
                            <small class="text-muted">Kelas yang diampu</small>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle-light bg-danger">
                                <i class="fas fa-door-open fa-2x text-white"></i>
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
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-dark">
                            <i class="fas fa-calendar-check text-info mr-2"></i>
                            Jadwal Mengajar Hari Ini
                        </h5>
                        <span class="badge badge-light border px-3 py-2">
                            <i class="far fa-calendar mr-1"></i>{{ date('d F Y') }}
                        </span>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($jadwal_pelajaran) == 0)
                        <div class="text-center py-5">
                            <i class="fas fa-mug-hot fa-4x text-muted mb-3" style="opacity: 0.3;"></i>
                            <h5 class="text-muted">Tidak ada jadwal mengajar hari ini</h5>
                            <p class="text-muted">Anda bisa beristirahat atau mempersiapkan materi untuk hari lainnya</p>
                        </div>
                    @else
                        <div class="row">
                            @foreach ($jadwal_pelajaran as $index => $data_jadwal_pelajaran)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="schedule-card-light">
                                        <div class="schedule-header-light bg-info">
                                            <span class="lesson-badge bg-white text-info">Les
                                                {{ $data_jadwal_pelajaran->jamPelajaran->les_ke }}</span>
                                            <span
                                                class="class-badge bg-white text-info">{{ $data_jadwal_pelajaran->rombel->kelas->nama }}</span>
                                        </div>
                                        <div class="schedule-body-light">
                                            <h6 class="mb-2 text-dark font-weight-bold">
                                                {{ $data_jadwal_pelajaran->guruMataPelajaran->mataPelajaran->nama }}
                                            </h6>
                                            <p class="text-muted small mb-2">
                                                <i
                                                    class="fas fa-user-tie mr-1"></i>{{ $data_jadwal_pelajaran->guruMataPelajaran->guru->inisial }}
                                            </p>
                                            <div class="pt-2 border-top">
                                                <i class="far fa-clock text-muted mr-1"></i>
                                                <span class="text-muted small">
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
        .icon-circle-light {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.9;
        }

        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075) !important;
        }

        .card {
            border-radius: 0.5rem;
        }

        .schedule-card-light {
            background: white;
            border: 1px solid #e3e6f0;
            border-radius: 0.5rem;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .schedule-card-light:hover {
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
        }

        .schedule-header-light {
            padding: 0.75rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .lesson-badge,
        .class-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .schedule-body-light {
            padding: 1rem;
            background: white;
        }
    </style>
@endsection
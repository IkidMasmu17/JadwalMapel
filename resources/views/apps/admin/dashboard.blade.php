@extends('layouts.app')

@section('title-page')
    Dashboard
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Dashboard</a></li>
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
                            <h2 class="mb-2 text-primary">
                                <i class="fas fa-graduation-cap mr-2"></i>Selamat Datang, Admin!
                            </h2>
                            <p class="mb-1 text-muted">Kelola sistem jadwal mata pelajaran dengan mudah dan efisien</p>
                            <small class="text-muted"><i class="far fa-calendar mr-1"></i>{{ date('l, d F Y') }}</small>
                        </div>
                        <div class="col-md-3 text-right d-none d-md-block">
                            <i class="fas fa-school fa-4x text-primary" style="opacity: 0.2;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Guru
                            </div>
                            <div class="h2 mb-0 font-weight-bold text-dark">{{ $guru }}</div>
                            <small class="text-muted">Tenaga pengajar</small>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle-light bg-warning">
                                <i class="fas fa-chalkboard-teacher fa-2x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Siswa
                            </div>
                            <div class="h2 mb-0 font-weight-bold text-dark">{{ $siswa }}</div>
                            <small class="text-muted">Peserta didik</small>
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

        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Kelas
                            </div>
                            <div class="h2 mb-0 font-weight-bold text-dark">{{ $kelas }}</div>
                            <small class="text-muted">Rombongan belajar</small>
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

    {{-- Today's Schedule --}}
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-dark">
                            <i class="fas fa-calendar-day text-primary mr-2"></i>
                            Jadwal Hari Ini
                        </h5>
                        <span class="badge badge-light border px-3 py-2">
                            <i class="far fa-calendar mr-1"></i>{{ date('d F Y') }}
                        </span>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if (count($jadwal_pelajaran) == 0)
                        <div class="text-center py-5">
                            <i class="fas fa-calendar-times fa-4x text-muted mb-3" style="opacity: 0.3;"></i>
                            <h5 class="text-muted">Tidak ada jadwal pelajaran hari ini</h5>
                            <p class="text-muted">Silakan cek jadwal untuk hari lainnya</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0 text-muted" width="5%">#</th>
                                        <th class="border-0 text-muted">Guru</th>
                                        <th class="border-0 text-muted text-center">Les Ke</th>
                                        <th class="border-0 text-muted">Mata Pelajaran</th>
                                        <th class="border-0 text-muted">Kelas</th>
                                        <th class="border-0 text-muted">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal_pelajaran as $index => $data_jadwal_pelajaran)
                                        <tr>
                                            <td class="text-muted">{{ $index + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-circle-light bg-primary text-white mr-2">
                                                        {{ substr($data_jadwal_pelajaran->guruMataPelajaran->guru->inisial, 0, 2) }}
                                                    </div>
                                                    <span
                                                        class="font-weight-medium text-dark">{{ $data_jadwal_pelajaran->guruMataPelajaran->guru->inisial }}</span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge badge-primary badge-pill px-3 py-2">{{ $data_jadwal_pelajaran->jamPelajaran->les_ke }}</span>
                                            </td>
                                            <td class="text-dark">
                                                {{ $data_jadwal_pelajaran->guruMataPelajaran->mataPelajaran->nama }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-light border px-3 py-1">{{ $data_jadwal_pelajaran->rombel->kelas->nama }}</span>
                                            </td>
                                            <td class="text-muted">
                                                <i class="far fa-clock mr-1"></i>
                                                {{ $data_jadwal_pelajaran->jamPelajaran->jam_mulai }} -
                                                {{ $data_jadwal_pelajaran->jamPelajaran->jam_selesai }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

        .avatar-circle-light {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: bold;
        }

        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075) !important;
        }

        .card {
            border-radius: 0.5rem;
        }

        .badge {
            font-weight: 500;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
@endsection
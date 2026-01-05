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
            <div class="card bg-gradient-primary text-white shadow-lg">
                <div class="card-body py-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2"><i class="fas fa-graduation-cap mr-2"></i>Selamat Datang, Admin!</h2>
                            <p class="mb-0 opacity-75">Kelola sistem jadwal mata pelajaran dengan mudah dan efisien</p>
                        </div>
                        <div class="col-md-4 text-right d-none d-md-block">
                            <i class="fas fa-school fa-5x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistics Cards --}}
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="card border-left-warning shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Guru
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $guru }}</div>
                            <small class="text-muted">Tenaga pengajar</small>
                        </div>
                        <div class="col-auto">
                            <div class="icon-circle bg-warning text-white">
                                <i class="fas fa-chalkboard-teacher fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="card border-left-success shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Siswa
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $siswa }}</div>
                            <small class="text-muted">Peserta didik</small>
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

        <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="card border-left-danger shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total Kelas
                            </div>
                            <div class="h3 mb-0 font-weight-bold text-gray-800">{{ $kelas }}</div>
                            <small class="text-muted">Rombongan belajar</small>
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

    {{-- Today's Schedule --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            <i class="fas fa-calendar-day text-primary mr-2"></i>
                            Jadwal Hari Ini
                        </h5>
                        <span class="badge badge-primary badge-pill">{{ date('d F Y') }}</span>
                    </div>
                </div>
                <div class="card-body">
                    @if (count($jadwal_pelajaran) == 0)
                        <div class="text-center py-5">
                            <i class="fas fa-calendar-times fa-4x text-muted mb-3"></i>
                            <h5 class="text-muted">Tidak ada jadwal pelajaran hari ini</h5>
                            <p class="text-muted">Silakan cek jadwal untuk hari lainnya</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="border-0" width="5%"><i class="fas fa-hashtag"></i></th>
                                        <th class="border-0"><i class="fas fa-user-tie mr-1"></i>Guru</th>
                                        <th class="border-0 text-center"><i class="fas fa-list-ol mr-1"></i>Les Ke</th>
                                        <th class="border-0"><i class="fas fa-book mr-1"></i>Mata Pelajaran</th>
                                        <th class="border-0"><i class="fas fa-door-open mr-1"></i>Kelas</th>
                                        <th class="border-0"><i class="fas fa-clock mr-1"></i>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal_pelajaran as $index => $data_jadwal_pelajaran)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-circle bg-primary text-white mr-2">
                                                        {{ substr($data_jadwal_pelajaran->guruMataPelajaran->guru->inisial, 0, 2) }}
                                                    </div>
                                                    <span
                                                        class="font-weight-medium">{{ $data_jadwal_pelajaran->guruMataPelajaran->guru->inisial }}</span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="badge badge-info">{{ $data_jadwal_pelajaran->jamPelajaran->les_ke }}</span>
                                            </td>
                                            <td>{{ $data_jadwal_pelajaran->guruMataPelajaran->mataPelajaran->nama }}</td>
                                            <td>
                                                <span
                                                    class="badge badge-secondary">{{ $data_jadwal_pelajaran->rombel->kelas->nama }}</span>
                                            </td>
                                            <td>
                                                <i class="far fa-clock text-muted mr-1"></i>
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
        .border-left-warning {
            border-left: 4px solid #f6c23e !important;
        }

        .border-left-success {
            border-left: 4px solid #28a745 !important;
        }

        .border-left-danger {
            border-left: 4px solid #dc3545 !important;
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .avatar-circle {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
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

        .bg-gradient-primary {
            background: linear-gradient(87deg, #007bff 0, #1171ef 100%);
        }
    </style>
@endsection
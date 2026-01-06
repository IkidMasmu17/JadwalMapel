@extends('layouts.app')

@section('title-page')
    Jadwal Pelajaran Mingguan
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('siswa./') }}">Beranda</a></li>
        <li class="breadcrumb-item active">Jadwal Pelajaran</li>
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

    {{-- Welcome Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-white overflow-hidden" style="border-radius: 15px;">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-md-8 p-4 d-flex flex-column justify-content-center">
                            <h2 class="mb-2 text-dark font-weight-bold">
                                <i class="fas fa-calendar-alt text-primary mr-2"></i>Jadwal Pelajaran Mingguan
                            </h2>
                            <p class="mb-0 text-muted font-weight-medium">
                                <span class="badge badge-light-primary text-primary px-3 py-2 mr-2">
                                    <i class="fas fa-graduation-cap mr-1"></i> Kelas: {{ $rombel->kelas->nama }}
                                </span>
                                <span class="badge badge-light-secondary text-muted px-3 py-2">
                                    <i class="far fa-calendar-alt mr-1"></i> {{ date('l, d F Y') }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-4 bg-primary text-white p-4 d-none d-md-flex align-items-center justify-content-center"
                            style="opacity: 0.9;">
                            <div class="text-center">
                                <i class="fas fa-clock fa-3x mb-2"></i>
                                <div class="font-weight-bold h4 mb-0" id="liveClock">00:00:00</div>
                                <small class="text-white-50">Waktu saat ini</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Weekly Schedule Grid --}}
    <div class="row">
        <div class="col-md-4 mb-4">
            @include('apps.siswa.components.day-compact-card', ['day' => 'Senin', 'jadwal' => $jadwal_pelajaran_senin])
        </div>
        <div class="col-md-4 mb-4">
            @include('apps.siswa.components.day-compact-card', ['day' => 'Selasa', 'jadwal' => $jadwal_pelajaran_selasa])
        </div>
        <div class="col-md-4 mb-4">
            @include('apps.siswa.components.day-compact-card', ['day' => 'Rabu', 'jadwal' => $jadwal_pelajaran_rabu])
        </div>
        <div class="col-md-4 mb-4">
            @include('apps.siswa.components.day-compact-card', ['day' => 'Kamis', 'jadwal' => $jadwal_pelajaran_kamis])
        </div>
        <div class="col-md-4 mb-4">
            @include('apps.siswa.components.day-compact-card', ['day' => 'Jumat', 'jadwal' => $jadwal_pelajaran_jumat])
        </div>
        <div class="col-md-4 mb-4">
            @include('apps.siswa.components.day-compact-card', ['day' => 'Sabtu', 'jadwal' => $jadwal_pelajaran_sabtu])
        </div>
    </div>

    <style>
        .badge-light-primary {
            background-color: rgba(0, 123, 255, 0.1);
        }

        .badge-light-secondary {
            background-color: rgba(108, 117, 125, 0.1);
        }

        .bg-white {
            background-color: #fff !important;
        }
    </style>
@endsection

@section('footer-scripts')
    <script type="text/javascript">
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;
            const clockElement = document.getElementById('liveClock');
            if (clockElement) clockElement.textContent = timeString;
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
@endsection
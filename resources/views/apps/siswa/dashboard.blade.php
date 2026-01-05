@extends('layouts.app')

@section('title-page')
    Jadwal Pelajaran
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('siswa./') }}">Home</a></li>
        <li class="breadcrumb-item active">Jadwal Pelajaran</li>
    </ol>
@endsection

@section('content')
    @if(Session::has('flash_message'))
        <script type="text/javascript">
            Swal.fire("Berhasil!", "{{ Session('flash_message') }}", "success");
        </script>
    @endif

    {{-- Welcome Banner --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient-success text-white shadow-lg">
                <div class="card-body py-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2"><i class="fas fa-calendar-week mr-2"></i>Jadwal Pelajaran Mingguan</h2>
                            <p class="mb-1 opacity-75">Kelas: <strong>{{ $rombel->kelas->nama }}</strong></p>
                            <small class="opacity-75"><i class="far fa-calendar mr-1"></i>{{ date('l, d F Y') }}</small>
                        </div>
                        <div class="col-md-4 text-right d-none d-md-block">
                            <i class="fas fa-book-open fa-5x opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Weekly Schedule in Accordion --}}
    <div class="row">
        <div class="col-12">
            <div class="accordion" id="scheduleAccordion">

                {{-- Monday --}}
                <div class="card shadow-sm mb-3">
                    <div class="card-header p-0" id="headingMonday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4"
                            type="button" data-toggle="collapse" data-target="#collapseMonday" aria-expanded="true">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-calendar-day text-primary mr-2"></i>Senin
                            </span>
                            <span class="badge badge-primary badge-pill">{{ count($jadwal_pelajaran_senin) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseMonday" class="collapse show" data-parent="#scheduleAccordion">
                        <div class="card-body">
                            @include('apps.siswa.components.modern-schedule-table', ['jadwal' => $jadwal_pelajaran_senin])
                        </div>
                    </div>
                </div>

                {{-- Tuesday --}}
                <div class="card shadow-sm mb-3">
                    <div class="card-header p-0" id="headingTuesday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseTuesday">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-calendar-day text-success mr-2"></i>Selasa
                            </span>
                            <span class="badge badge-success badge-pill">{{ count($jadwal_pelajaran_selasa) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseTuesday" class="collapse" data-parent="#scheduleAccordion">
                        <div class="card-body">
                            @include('apps.siswa.components.modern-schedule-table', ['jadwal' => $jadwal_pelajaran_selasa])
                        </div>
                    </div>
                </div>

                {{-- Wednesday --}}
                <div class="card shadow-sm mb-3">
                    <div class="card-header p-0" id="headingWednesday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseWednesday">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-calendar-day text-info mr-2"></i>Rabu
                            </span>
                            <span class="badge badge-info badge-pill">{{ count($jadwal_pelajaran_rabu) }} Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseWednesday" class="collapse" data-parent="#scheduleAccordion">
                        <div class="card-body">
                            @include('apps.siswa.components.modern-schedule-table', ['jadwal' => $jadwal_pelajaran_rabu])
                        </div>
                    </div>
                </div>

                {{-- Thursday --}}
                <div class="card shadow-sm mb-3">
                    <div class="card-header p-0" id="headingThursday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseThursday">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-calendar-day text-warning mr-2"></i>Kamis
                            </span>
                            <span class="badge badge-warning badge-pill">{{ count($jadwal_pelajaran_kamis) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseThursday" class="collapse" data-parent="#scheduleAccordion">
                        <div class="card-body">
                            @include('apps.siswa.components.modern-schedule-table', ['jadwal' => $jadwal_pelajaran_kamis])
                        </div>
                    </div>
                </div>

                {{-- Friday --}}
                <div class="card shadow-sm mb-3">
                    <div class="card-header p-0" id="headingFriday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseFriday">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-calendar-day text-danger mr-2"></i>Jumat
                            </span>
                            <span class="badge badge-danger badge-pill">{{ count($jadwal_pelajaran_jumat) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseFriday" class="collapse" data-parent="#scheduleAccordion">
                        <div class="card-body">
                            @include('apps.siswa.components.modern-schedule-table', ['jadwal' => $jadwal_pelajaran_jumat])
                        </div>
                    </div>
                </div>

                {{-- Saturday --}}
                <div class="card shadow-sm mb-3">
                    <div class="card-header p-0" id="headingSaturday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseSaturday">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-calendar-day text-secondary mr-2"></i>Sabtu
                            </span>
                            <span class="badge badge-secondary badge-pill">{{ count($jadwal_pelajaran_sabtu) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseSaturday" class="collapse" data-parent="#scheduleAccordion">
                        <div class="card-body">
                            @include('apps.siswa.components.modern-schedule-table', ['jadwal' => $jadwal_pelajaran_sabtu])
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .shadow-lg {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }

        .bg-gradient-success {
            background: linear-gradient(87deg, #28a745 0, #20c997 100%);
        }

        .opacity-75 {
            opacity: 0.75;
        }

        .opacity-50 {
            opacity: 0.5;
        }

        .accordion .card {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .accordion .btn-link {
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .accordion .btn-link:hover {
            background-color: #f8f9fa;
        }

        .accordion .btn-link:focus {
            box-shadow: none;
        }
    </style>
@endsection

@section('footer-scripts')
    <script type="text/javascript">
        function deleteThis(e) {
            e.preventDefault();
            Swal.fire({
                title: "<div style='font-size:20px'>Apakah anda yakin?</div>",
                html: "<div style='font-size:15px'>Data akan dihapus secara permanen!</div>",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            })
                .then((res) => {
                    if (res.isConfirmed) {
                        e.target.submit();
                        swal("Data telah dihapus!", {
                            icon: "success",
                        });
                    }
                });

            return false;
        }
    </script>
@endsection
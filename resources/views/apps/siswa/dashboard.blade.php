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
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body py-4">
                    <div class="row align-items-center">
                        <div class="col-md-9">
                            <h2 class="mb-2 text-success">
                                <i class="fas fa-calendar-week mr-2"></i>Jadwal Pelajaran Mingguan
                            </h2>
                            <p class="mb-1 text-muted">Kelas: <strong>{{ $rombel->kelas->nama }}</strong></p>
                            <small class="text-muted"><i class="far fa-calendar mr-1"></i>{{ date('l, d F Y') }}</small>
                        </div>
                        <div class="col-md-3 text-right d-none d-md-block">
                            <i class="fas fa-book-open fa-4x text-success" style="opacity: 0.2;"></i>
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
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white p-0 border-0" id="headingMonday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 text-decoration-none"
                            type="button" data-toggle="collapse" data-target="#collapseMonday" aria-expanded="true">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-circle text-primary mr-2" style="font-size: 0.5rem;"></i>Senin
                            </span>
                            <span class="badge badge-primary badge-pill px-3 py-2">{{ count($jadwal_pelajaran_senin) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseMonday" class="collapse show" data-parent="#scheduleAccordion">
                        <div class="card-body bg-white">
                            @include('apps.siswa.components.modern-schedule-table-light', ['jadwal' => $jadwal_pelajaran_senin, 'color' => 'primary'])
                        </div>
                    </div>
                </div>

                {{-- Tuesday --}}
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white p-0 border-0" id="headingTuesday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 text-decoration-none collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseTuesday">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-circle text-success mr-2" style="font-size: 0.5rem;"></i>Selasa
                            </span>
                            <span class="badge badge-success badge-pill px-3 py-2">{{ count($jadwal_pelajaran_selasa) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseTuesday" class="collapse" data-parent="#scheduleAccordion">
                        <div class="card-body bg-white">
                            @include('apps.siswa.components.modern-schedule-table-light', ['jadwal' => $jadwal_pelajaran_selasa, 'color' => 'success'])
                        </div>
                    </div>
                </div>

                {{-- Wednesday --}}
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white p-0 border-0" id="headingWednesday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 text-decoration-none collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseWednesday">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-circle text-info mr-2" style="font-size: 0.5rem;"></i>Rabu
                            </span>
                            <span class="badge badge-info badge-pill px-3 py-2">{{ count($jadwal_pelajaran_rabu) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseWednesday" class="collapse" data-parent="#scheduleAccordion">
                        <div class="card-body bg-white">
                            @include('apps.siswa.components.modern-schedule-table-light', ['jadwal' => $jadwal_pelajaran_rabu, 'color' => 'info'])
                        </div>
                    </div>
                </div>

                {{-- Thursday --}}
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white p-0 border-0" id="headingThursday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 text-decoration-none collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseThursday">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-circle text-warning mr-2" style="font-size: 0.5rem;"></i>Kamis
                            </span>
                            <span class="badge badge-warning badge-pill px-3 py-2">{{ count($jadwal_pelajaran_kamis) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseThursday" class="collapse" data-parent="#scheduleAccordion">
                        <div class="card-body bg-white">
                            @include('apps.siswa.components.modern-schedule-table-light', ['jadwal' => $jadwal_pelajaran_kamis, 'color' => 'warning'])
                        </div>
                    </div>
                </div>

                {{-- Friday --}}
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white p-0 border-0" id="headingFriday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 text-decoration-none collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseFriday">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-circle text-danger mr-2" style="font-size: 0.5rem;"></i>Jumat
                            </span>
                            <span class="badge badge-danger badge-pill px-3 py-2">{{ count($jadwal_pelajaran_jumat) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseFriday" class="collapse" data-parent="#scheduleAccordion">
                        <div class="card-body bg-white">
                            @include('apps.siswa.components.modern-schedule-table-light', ['jadwal' => $jadwal_pelajaran_jumat, 'color' => 'danger'])
                        </div>
                    </div>
                </div>

                {{-- Saturday --}}
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-header bg-white p-0 border-0" id="headingSaturday">
                        <button
                            class="btn btn-link btn-block text-left d-flex justify-content-between align-items-center py-3 px-4 text-decoration-none collapsed"
                            type="button" data-toggle="collapse" data-target="#collapseSaturday">
                            <span class="font-weight-bold text-dark">
                                <i class="fas fa-circle text-secondary mr-2" style="font-size: 0.5rem;"></i>Sabtu
                            </span>
                            <span class="badge badge-secondary badge-pill px-3 py-2">{{ count($jadwal_pelajaran_sabtu) }}
                                Pelajaran</span>
                        </button>
                    </div>
                    <div id="collapseSaturday" class="collapse" data-parent="#scheduleAccordion">
                        <div class="card-body bg-white">
                            @include('apps.siswa.components.modern-schedule-table-light', ['jadwal' => $jadwal_pelajaran_sabtu, 'color' => 'secondary'])
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, .075) !important;
        }

        .card {
            border-radius: 0.5rem;
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

        .badge {
            font-weight: 500;
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
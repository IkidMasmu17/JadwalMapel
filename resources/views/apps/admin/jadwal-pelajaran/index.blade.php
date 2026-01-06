@extends('layouts.app')

@section('title-page')
    Manajemen Jadwal Pelajaran
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
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

    <div class="row">
        <!-- Top Controls: Add & Search -->
        <div class="col-md-12 mb-4">
            <div class="row">
                <!-- Add Schedule Form -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white py-3">
                            <h6 class="mb-0 text-dark font-weight-bold">
                                <i class="fas fa-plus-circle text-primary mr-2"></i>Tambah Jadwal Pelajaran
                            </h6>
                        </div>
                        <form action="{{ route('admin.jadwal_pelajaran.store') }}" method="POST">
                            @csrf @method('POST')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mb-0">
                                            <label class="text-muted small font-weight-bold text-uppercase">Waktu /
                                                Jam</label>
                                            <select name="jam_pelajaran_id"
                                                class="form-control border-0 bg-light shadow-none custom-select" required>
                                                <option value="" disabled selected>- Pilih Jam -</option>
                                                @foreach ($jam_pelajaran as $item)
                                                    <option value="{{ $item->id }}">
                                                        {{ $item->hari }} | {{ date('H:i', strtotime($item->jam_mulai)) }} -
                                                        {{ date('H:i', strtotime($item->jam_selesai)) }} | {{ $item->status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-0">
                                            <label class="text-muted small font-weight-bold text-uppercase">Guru &
                                                Mapel</label>
                                            <select name="guru_mata_pelajaran_id"
                                                class="form-control border-0 bg-light shadow-none custom-select">
                                                <option value="">- Non-Belajar / Pilih Guru -</option>
                                                @foreach ($guru_mata_pelajaran as $item)
                                                    <option value="{{ $item->id }}">
                                                        [{{ $item->guru->inisial }}] {{ $item->guru->nama }} -
                                                        {{ $item->mataPelajaran->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-0">
                                            <label class="text-muted small font-weight-bold text-uppercase">Rombel /
                                                Kelas</label>
                                            <select name="rombel_id"
                                                class="form-control border-0 bg-light shadow-none custom-select">
                                                <option value="">- Semua / Pilih Rombel -</option>
                                                @foreach ($rombel as $item)
                                                    <option value="{{ $item->id }}">{{ $item->kelas->nama }} (Tingkat
                                                        {{ $item->kelas->tingkat->nama }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white border-top-0 text-right py-3">
                                <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                    <i class="fas fa-save mr-1"></i> Simpan Jadwal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Search/Filter Form -->
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white py-3">
                            <h6 class="mb-0 text-dark font-weight-bold">
                                <i class="fas fa-filter text-info mr-2"></i>Filter Tampilan
                            </h6>
                        </div>
                        <form action="{{ route('admin.jadwal_pelajaran') }}" method="GET">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <label class="text-muted small font-weight-bold text-uppercase">Pilih Rombel</label>
                                    <select name="q_rombel" class="form-control border-0 bg-light shadow-none custom-select"
                                        required>
                                        <option value="" disabled selected>- Pilih Rombel -</option>
                                        @foreach ($rombel as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $q_rombel ? 'selected' : '' }}>
                                                {{ $item->kelas->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer bg-white border-top-0 text-right py-3">
                                <button type="submit" class="btn btn-info text-white px-4 shadow-sm">
                                    <i class="fas fa-search mr-1"></i> Tampilkan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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

        .form-control,
        .custom-select {
            border-radius: 8px;
            height: auto !important;
            padding: 0.75rem 1.25rem;
            font-size: 14px;
        }

        .form-control:focus,
        .custom-select:focus {
            background-color: #fff !important;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.1) !important;
            border: 1px solid #007bff !important;
        }
    </style>
@endsection

@section('footer-scripts')
    <script type="text/javascript">
        function deleteThis(e) {
            e.preventDefault();
            Swal.fire({
                title: "Hapus Jadwal?",
                text: "Data jadwal pelajaran ini akan dihapus permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            })
                .then((res) => { if (res.isConfirmed) { e.target.submit(); } });
        }
    </script>
@endsection
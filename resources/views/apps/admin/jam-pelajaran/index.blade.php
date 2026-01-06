@extends('layouts.app')

@section('title-page')
    Pengaturan Jam Pelajaran
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item active">Jam Pelajaran</li>
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
        <!-- Form Section -->
        <div class="col-md-12 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 text-dark font-weight-bold">
                        <i class="fas fa-clock text-primary mr-2"></i>Tambah Jam Pelajaran Baru
                    </h5>
                </div>
                <form action="{{ route('admin.jam_pelajaran.store') }}" method="POST">
                    @csrf @method('POST')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-muted small font-weight-bold text-uppercase">Hari</label>
                                    <select name="hari" class="form-control border-0 bg-light shadow-none custom-select"
                                        required>
                                        <option value="" disabled selected>- Pilih Hari -</option>
                                        @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $h)
                                            <option value="{{ $h }}">{{ $h }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-muted small font-weight-bold text-uppercase">Les Ke-</label>
                                    <input type="number" name="les_ke" class="form-control border-0 bg-light shadow-none"
                                        placeholder="1">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-muted small font-weight-bold text-uppercase">Jam Mulai</label>
                                    <input type="time" name="jam_mulai" class="form-control border-0 bg-light shadow-none"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="text-muted small font-weight-bold text-uppercase">Jam Selesai</label>
                                    <input type="time" name="jam_selesai" class="form-control border-0 bg-light shadow-none"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-muted small font-weight-bold text-uppercase">Status / Jenis</label>
                                    <select name="status" class="form-control border-0 bg-light shadow-none custom-select"
                                        required>
                                        <option value="" disabled selected>- Pilih Status -</option>
                                        <option value="Belajar">Belajar</option>
                                        <option value="Istirahat">Istirahat</option>
                                        <option value="Upacara">Upacara</option>
                                        <option value="Kegiatan Lain">Kegiatan Lain</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-top-0 text-right py-3">
                        <button type="submit" class="btn btn-primary px-4 shadow-sm">
                            <i class="fas fa-plus-circle mr-1"></i> Tambah Jam
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Daily Breakdown Section -->
        <div class="col-md-12">
            <div class="row">
                @include('apps.admin.jam-pelajaran.components.senin', ['jam_pelajaran_senin' => $jam_pelajaran_senin])
                @include('apps.admin.jam-pelajaran.components.selasa', ['jam_pelajaran_selasa' => $jam_pelajaran_selasa])
                @include('apps.admin.jam-pelajaran.components.rabu', ['jam_pelajaran_rabu' => $jam_pelajaran_rabu])
                @include('apps.admin.jam-pelajaran.components.kamis', ['jam_pelajaran_kamis' => $jam_pelajaran_kamis])
                @include('apps.admin.jam-pelajaran.components.jumat', ['jam_pelajaran_jumat' => $jam_pelajaran_jumat])
                @include('apps.admin.jam-pelajaran.components.sabtu', ['jam_pelajaran_sabtu' => $jam_pelajaran_sabtu])
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
                title: "Hapus Jam Pelajaran?",
                text: "Data jam pelajaran ini akan dihapus permanen!",
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
@extends('layouts.app')

@section('title-page')
    Guru Mata Pelajaran - {{ $mata_pelajaran->nama }}
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.mata_pelajaran') }}">Mata Pelajaran</a></li>
        <li class="breadcrumb-item active">Guru Mapel</li>
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
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0 text-dark font-weight-bold">
                                <i class="fas fa-chalkboard-teacher text-primary mr-2"></i>Daftar Pengajar: <span
                                    class="text-primary">{{ $mata_pelajaran->nama }}</span>
                            </h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.mata_pelajaran.guru_mapel.create', $mata_pelajaran->id) }}"
                                class="btn btn-primary btn-sm px-3 shadow-sm">
                                <i class="fas fa-plus mr-1"></i> Tambah Pengajar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="px-4 py-3 border-bottom bg-light">
                        <div class="row">
                            <div class="col-md-4 ml-auto">
                                <form action="{{ route('admin.mata_pelajaran.guru_mapel', $mata_pelajaran->id) }}"
                                    method="GET">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="q_nama" value="{{ $q_nama }}"
                                            class="form-control border-0 shadow-sm"
                                            placeholder="Cari nama guru atau kelas...">
                                        <div class="input-group-append">
                                            <button class="btn btn-white border-0 shadow-sm" type="submit">
                                                <i class="fas fa-search text-muted"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-muted">
                                <tr>
                                    <th class="border-0 px-4 py-3 text-uppercase small font-weight-bold" width="80px">#</th>
                                    <th class="border-0 py-3 text-uppercase small font-weight-bold">Nama Guru</th>
                                    <th class="border-0 py-3 text-uppercase small font-weight-bold">Penempatan Kelas</th>
                                    <th class="border-0 px-4 py-3 text-uppercase small font-weight-bold text-right"
                                        width="180px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($guru_mata_pelajaran) === 0)
                                    <tr>
                                        <td colspan="4" class="text-center py-5">
                                            <div class="py-3">
                                                <i class="fas fa-search fa-3x text-muted mb-3 opacity-25"></i>
                                                <p class="text-muted font-italic mb-0">
                                                    @if ($q_nama == "")
                                                        Belum ada guru yang ditugaskan untuk mata pelajaran ini.
                                                    @else
                                                        Kriteria pencarian "{{ $q_nama }}" tidak ditemukan.
                                                    @endif
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                                @foreach ($guru_mata_pelajaran as $data_guru_mata_pelajaran)
                                    <tr>
                                        <td class="px-4 py-3 text-muted">{{ $loop->iteration + $skipped }}</td>
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle-sm bg-light-primary text-primary mr-3">
                                                    {{ substr($data_guru_mata_pelajaran->guru->nama, 0, 1) }}
                                                </div>
                                                <span
                                                    class="font-weight-medium text-dark">{{ $data_guru_mata_pelajaran->guru->nama }}</span>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <span class="badge badge-light border px-3 py-1 text-dark">
                                                {{ $data_guru_mata_pelajaran->kelas->nama }} - Tingkat
                                                {{ $data_guru_mata_pelajaran->kelas->tingkat->nama }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <div class="btn-group shadow-sm">
                                                <a href="{{ route('admin.mata_pelajaran.guru_mapel.edit', [$data_guru_mata_pelajaran->id, $mata_pelajaran->id]) }}"
                                                    class="btn btn-white btn-sm border-0" title="Ubah">
                                                    <i class="fas fa-edit text-warning"></i>
                                                </a>
                                                <form onsubmit="deleteThis(event)"
                                                    action="{{ route('admin.mata_pelajaran.guru_mapel.delete') }}" method="POST"
                                                    style="display:inline-block">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                                    <input type="hidden" name="mata_pelajaran_id"
                                                        value="{{ $mata_pelajaran->id }}">
                                                    <input type="hidden" name="id" value="{{ $data_guru_mata_pelajaran->id }}">
                                                    <button type="submit" class="btn btn-white btn-sm border-0" title="Hapus">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white py-3 border-top-0 d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.mata_pelajaran') }}" class="btn btn-light btn-sm px-3">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali ke Mapel
                    </a>
                    <div class="small text-muted font-italic">
                        Total {{ count($guru_mata_pelajaran) }} pengajar terdaftar
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table td,
        .table th {
            vertical-align: middle;
        }

        .bg-light-primary {
            background-color: rgba(0, 123, 255, 0.1);
        }

        .avatar-circle-sm {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 13px;
        }

        .btn-white {
            background-color: #fff;
            color: #444;
        }

        .btn-white:hover {
            background-color: #f8f9fa;
            color: #222;
        }

        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
        }

        .card {
            border-radius: 12px;
        }

        .card-header {
            border-top-left-radius: 12px !important;
            border-top-right-radius: 12px !important;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.02);
        }

        .opacity-25 {
            opacity: 0.25;
        }
    </style>
@endsection

@section('footer-scripts')
    <script type="text/javascript">
        function deleteThis(e) {
            e.preventDefault();
            Swal.fire({
                title: "Hapus Penugasan Guru?",
                text: "Data penugasan pengajar akan dihapus secara permanen!",
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
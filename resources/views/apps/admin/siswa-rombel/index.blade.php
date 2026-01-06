@extends('layouts.app')

@section('title-page')
    Manajemen Siswa Rombel - {{ $rombel->kelas->nama }}
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.rombel') }}">Rombel</a></li>
        <li class="breadcrumb-item active">Kelola Siswa</li>
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
        <!-- List Siswa (Left) -->
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="mb-0 text-dark font-weight-bold">
                                <i class="fas fa-users text-primary mr-2"></i>Daftar Siswa Tersedia
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="px-4 py-3 border-bottom bg-light">
                        <form action="{{ route('admin.rombel.siswa-rombel', $rombel->id) }}" method="GET">
                            <div class="input-group input-group-sm">
                                <input type="text" name="q_nama_siswa" value="{{ $q_nama_siswa }}"
                                    class="form-control border-0 shadow-sm" placeholder="Cari nama atau NISN...">
                                <div class="input-group-append">
                                    <button class="btn btn-white border-0 shadow-sm" type="submit">
                                        <i class="fas fa-search text-muted"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-muted">
                                <tr>
                                    <th class="border-0 px-4 py-3 text-uppercase small font-weight-bold" width="50">#</th>
                                    <th class="border-0 py-3 text-uppercase small font-weight-bold">Siswa</th>
                                    <th class="border-0 px-4 py-3 text-uppercase small font-weight-bold text-right">Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswa as $data_siswa)
                                    <tr>
                                        <td class="px-4 py-3 text-muted">{{ $loop->iteration }}</td>
                                        <td class="py-3">
                                            <div class="d-flex flex-column">
                                                <span class="font-weight-bold text-dark">{{ $data_siswa->nama }}</span>
                                                <small class="text-muted">NISN: {{ $data_siswa->nisn }}</small>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <form action="{{ route('admin.rombel.siswa-rombel.store') }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <input type="hidden" name="rombel_id" value="{{ $rombel->id }}">
                                                <input type="hidden" name="siswa_id" value="{{ $data_siswa->id }}">
                                                <button type="submit" class="btn btn-outline-primary btn-sm px-3 shadow-none"
                                                    style="border-radius: 20px;">
                                                    <i class="fas fa-plus mr-1"></i> Masukkan
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-5">
                                            <i class="fas fa-user-slash fa-2x text-muted opacity-25 mb-3"></i>
                                            <p class="text-muted small mb-0">Tidak ada siswa tersedia</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 py-3">
                    {{ $siswa->appends(['q_nama_siswa' => $q_nama_siswa])->links() }}
                </div>
            </div>
        </div>

        <!-- Rombel Members (Right) -->
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 text-dark font-weight-bold">
                        <i class="fas fa-id-badge text-success mr-2"></i>Anggota {{ $rombel->kelas->nama }}
                    </h6>
                </div>
                <div class="card-body p-0">
                    <div class="px-4 py-3 border-bottom bg-light">
                        <form action="{{ route('admin.rombel.siswa-rombel', $rombel->id) }}" method="GET">
                            <div class="input-group input-group-sm">
                                <input type="text" name="q_nama_siswa_rombel" value="{{ $q_nama_siswa_rombel }}"
                                    class="form-control border-0 shadow-sm" placeholder="Cari di kelas ini...">
                                <div class="input-group-append">
                                    <button class="btn btn-white border-0 shadow-sm" type="submit">
                                        <i class="fas fa-search text-muted"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-muted">
                                <tr>
                                    <th class="border-0 px-4 py-3 text-uppercase small font-weight-bold">Siswa</th>
                                    <th class="border-0 px-4 py-3 text-uppercase small font-weight-bold text-right"
                                        width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswa_rombel as $data_siswa_rombel)
                                    <tr>
                                        <td class="px-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-circle-xs bg-light-success text-success mr-3">
                                                    {{ substr($data_siswa_rombel->siswa->nama, 0, 1) }}
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <span
                                                        class="font-weight-bold text-dark">{{ $data_siswa_rombel->siswa->nama }}</span>
                                                    <small class="text-muted">{{ $data_siswa_rombel->siswa->nisn }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <form onsubmit="deleteThis(event)"
                                                action="{{ route('admin.rombel.siswa-rombel.delete') }}" method="POST"
                                                class="d-inline">
                                                @csrf @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $data_siswa_rombel->id }}">
                                                <button type="submit" class="btn btn-link text-danger p-0"
                                                    title="Keluarkan dari Rombel">
                                                    <i class="fas fa-minus-circle fa-lg"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center py-5">
                                            <i class="fas fa-user-friends fa-2x text-muted opacity-25 mb-3"></i>
                                            <p class="text-muted small mb-0">Rombel masih kosong</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 py-3">
                    {{ $siswa_rombel->appends(['q_nama_siswa_rombel' => $q_nama_siswa_rombel])->links() }}
                </div>
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

        .avatar-circle-xs {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 11px;
        }

        .bg-light-success {
            background-color: rgba(40, 167, 69, 0.1);
        }

        .btn-white {
            background-color: #fff;
            color: #444;
        }

        .opacity-25 {
            opacity: 0.25;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.02);
        }
    </style>
@endsection

@section('footer-scripts')
    <script type="text/javascript">
        function deleteThis(e) {
            e.preventDefault();
            Swal.fire({
                title: "Keluarkan Siswa?",
                text: "Siswa akan dikeluarkan dari rombel ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Keluarkan!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            })
                .then((res) => { if (res.isConfirmed) { e.target.submit(); } });
        }
    </script>
@endsection
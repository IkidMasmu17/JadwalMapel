@extends('layouts.app')

@section('title-page')
    Manajemen Jabatan
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Beranda</a></li>
        <li class="breadcrumb-item active">Jabatan</li>
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
                                <i class="fas fa-briefcase text-primary mr-2"></i>Daftar Jabatan
                            </h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.jabatan.create') }}" class="btn btn-primary btn-sm px-3 shadow-sm">
                                <i class="fas fa-plus mr-1"></i> Tambah Jabatan
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="px-4 py-3 border-bottom bg-light">
                        <div class="row">
                            <div class="col-md-4 ml-auto">
                                <form action="{{ route('admin.jabatan') }}" method="GET">
                                    <div class="input-group input-group-sm">
                                        <input type="text" name="q_nama" value="{{ $q_nama }}"
                                            class="form-control border-0 shadow-sm" placeholder="Cari nama jabatan...">
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
                                    <th class="border-0 py-3 text-uppercase small font-weight-bold">Nama Jabatan</th>
                                    <th class="border-0 px-4 py-3 text-uppercase small font-weight-bold text-right"
                                        width="200px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($jabatan) === 0)
                                    <tr>
                                        <td colspan="3" class="text-center py-5">
                                            <div class="py-3">
                                                <i class="fas fa-search fa-3x text-muted mb-3 opacity-25"></i>
                                                <p class="text-muted font-italic mb-0">
                                                    @if ($q_nama == "")
                                                        Tidak ada data jabatan ditemukan.
                                                    @else
                                                        Kriteria pencarian "{{ $q_nama }}" tidak ditemukan.
                                                    @endif
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif

                                @foreach ($jabatan as $data_jabatan)
                                    <tr>
                                        <td class="px-4 py-3 text-muted">{{ $loop->iteration + $skipped }}</td>
                                        <td class="py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="icon-shape-sm bg-light-primary text-primary mr-3">
                                                    <i class="fas fa-id-badge"></i>
                                                </div>
                                                <span class="font-weight-medium text-dark">{{ $data_jabatan->name }}</span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <div class="btn-group shadow-sm">
                                                <a href="{{ route('admin.jabatan.edit', $data_jabatan->id) }}"
                                                    class="btn btn-white btn-sm border-0" title="Ubah">
                                                    <i class="fas fa-edit text-warning"></i>
                                                </a>
                                                <form onsubmit="deleteThis(event)" action="{{ route('admin.jabatan.delete') }}"
                                                    method="POST" style="display:inline-block">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                                    <input type="hidden" name="id" value="{{ $data_jabatan->id }}">
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

                <div class="card-footer bg-white py-3 border-top-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="small text-muted">
                            Menampilkan {{ count($jabatan) }} data dari total {{ $jabatan->total() }}
                        </div>
                        <div>
                            {{ $jabatan->appends(['q_nama' => $q_nama])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Custom Table Styling */
        .table td,
        .table th {
            vertical-align: middle;
        }

        .bg-light-primary {
            background-color: rgba(0, 123, 255, 0.1);
        }

        .icon-shape-sm {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 14px;
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

        .pagination {
            margin-bottom: 0;
        }

        .input-group-sm>.form-control {
            border-radius: 8px 0 0 8px;
        }

        .input-group-sm>.input-group-append>.btn {
            border-radius: 0 8px 8px 0;
        }

        /* Row Hover Effect */
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
                title: "Hapus Jabatan?",
                text: "Data akan dihapus secara permanen dan tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            })
                .then((res) => {
                    if (res.isConfirmed) {
                        e.target.submit();
                    }
                });
        }
    </script>
@endsection
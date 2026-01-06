@if(count($jadwal) == 0)
    <div class="text-center py-4">
        <i class="fas fa-calendar-times fa-3x text-muted mb-3" style="opacity: 0.3;"></i>
        <p class="text-muted mb-0">Tidak ada jadwal pelajaran</p>
    </div>
@else
    <div class="row">
        @foreach ($jadwal as $data)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="schedule-card-white">
                    <div class="schedule-header-white border-{{ $color ?? 'primary' }}">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="lesson-number-white badge badge-{{ $color ?? 'primary' }} px-3 py-2">Les
                                {{ $data->jamPelajaran->les_ke }}</span>
                            <span class="time-badge-white text-muted small">
                                <i class="far fa-clock mr-1"></i>{{ $data->jamPelajaran->jam_mulai }} -
                                {{ $data->jamPelajaran->jam_selesai }}
                            </span>
                        </div>
                    </div>
                    <div class="schedule-body-white">
                        @if ($data->jamPelajaran->status == "Belajar")
                            <h6 class="subject-name-white text-dark font-weight-bold mb-2">
                                <i class="fas fa-book text-{{ $color ?? 'primary' }} mr-2"></i>
                                {{ $data->guruMataPelajaran->mataPelajaran->nama }}
                            </h6>
                            <p class="teacher-name-white text-muted mb-0 small">
                                <i class="fas fa-user-tie mr-1"></i>{{ $data->guruMataPelajaran->guru->inisial }}
                            </p>
                        @else
                            <h6 class="subject-name-white text-muted font-weight-bold mb-2">
                                <i class="fas fa-mug-hot mr-2"></i>{{ $data->jamPelajaran->status }}
                            </h6>
                            <p class="teacher-name-white text-muted mb-0 small">
                                <i class="fas fa-pause-circle mr-1"></i>Waktu istirahat
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

<style>
    .schedule-card-white {
        background: white;
        border: 1px solid #e3e6f0;
        border-radius: 0.5rem;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
    }

    .schedule-card-white:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
    }

    .schedule-header-white {
        padding: 1rem;
        background: #f8f9fa;
        border-bottom: 1px solid #e3e6f0;
    }

    .schedule-header-white.border-primary {
        border-left: 4px solid #007bff;
    }

    .schedule-header-white.border-success {
        border-left: 4px solid #28a745;
    }

    .schedule-header-white.border-info {
        border-left: 4px solid #17a2b8;
    }

    .schedule-header-white.border-warning {
        border-left: 4px solid #ffc107;
    }

    .schedule-header-white.border-danger {
        border-left: 4px solid #dc3545;
    }

    .schedule-header-white.border-secondary {
        border-left: 4px solid #6c757d;
    }

    .lesson-number-white {
        font-weight: 600;
        font-size: 0.875rem;
    }

    .time-badge-white {
        font-weight: 500;
    }

    .schedule-body-white {
        padding: 1rem;
        background: white;
    }

    .subject-name-white {
        font-size: 1rem;
    }

    .teacher-name-white {
        font-size: 0.875rem;
    }
</style>
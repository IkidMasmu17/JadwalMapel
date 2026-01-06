@php
    $dayColors = [
        'Senin' => 'primary',
        'Selasa' => 'success',
        'Rabu' => 'info',
        'Kamis' => 'warning',
        'Jumat' => 'danger',
        'Sabtu' => 'secondary'
    ];
    $color = $dayColors[$day] ?? 'primary';
@endphp

<div class="card border-0 shadow-sm h-100 day-card animated fadeIn">
    <div class="card-header bg-white border-bottom-0 py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 font-weight-bold text-dark">
            <i class="fas fa-calendar-day text-{{ $color }} mr-2"></i>{{ $day }}
        </h5>
        <span class="badge badge-{{ $color }} badge-pill px-3 py-1">
            {{ count($jadwal) }} Pelajaran
        </span>
    </div>
    <div class="card-body p-0 pb-3">
        @if(count($jadwal) == 0)
            <div class="text-center py-5">
                <i class="fas fa-calendar-times fa-2x text-muted mb-2" style="opacity: 0.2;"></i>
                <p class="text-muted small mb-0 font-italic">Tidak ada jadwal</p>
            </div>
        @else
            <div class="list-group list-group-flush">
                @foreach($jadwal as $data)
                    <div class="list-group-item border-0 px-4 py-3 schedule-item">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="small font-weight-bold text-{{ $color }}">Les {{ $data->jamPelajaran->les_ke }}</span>
                            <span class="extra-small text-muted font-weight-medium">
                                <i class="far fa-clock mr-1"></i>{{ date('H:i', strtotime($data->jamPelajaran->jam_mulai)) }} -
                                {{ date('H:i', strtotime($data->jamPelajaran->jam_selesai)) }}
                            </span>
                        </div>
                        @if($data->jamPelajaran->status == "Belajar")
                            <div class="subject-name font-weight-bold text-dark mb-1">
                                {{ $data->guruMataPelajaran->mataPelajaran->nama }}</div>
                            <div class="teacher-name extra-small text-muted">
                                <i class="fas fa-chalkboard-teacher mr-1"></i>{{ $data->guruMataPelajaran->guru->nama }}
                            </div>
                        @else
                            <div class="status-name font-weight-bold text-muted italic">
                                <i class="fas fa-mug-hot mr-1"></i>{{ $data->jamPelajaran->status }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<style>
    .day-card {
        border-radius: 12px !important;
        transition: all 0.3s ease;
    }

    .day-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1) !important;
    }

    .schedule-item {
        background: transparent;
        transition: background-color 0.2s ease;
    }

    .schedule-item:hover {
        background-color: #f8f9fa;
    }

    .extra-small {
        font-size: 0.75rem;
    }

    .subject-name {
        font-size: 14px;
        line-height: 1.2;
    }

    .animated {
        animation-duration: 0.5s;
        animation-fill-mode: both;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fadeIn {
        animation-name: fadeIn;
    }
</style>
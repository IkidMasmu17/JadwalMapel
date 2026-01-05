@if(count($jadwal) == 0)
    <div class="text-center py-4">
        <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
        <p class="text-muted mb-0">Tidak ada jadwal pelajaran</p>
    </div>
@else
    <div class="row">
        @foreach ($jadwal as $data)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="schedule-card">
                    <div class="schedule-header">
                        <span class="lesson-number">Les {{ $data->jamPelajaran->les_ke }}</span>
                        <span class="time-badge">
                            <i class="far fa-clock mr-1"></i>
                            {{ $data->jamPelajaran->jam_mulai }} - {{ $data->jamPelajaran->jam_selesai }}
                        </span>
                    </div>
                    <div class="schedule-body">
                        @if ($data->jamPelajaran->status == "Belajar")
                            <h6 class="subject-name">
                                <i class="fas fa-book text-primary mr-1"></i>
                                {{ $data->guruMataPelajaran->mataPelajaran->nama }}
                            </h6>
                            <p class="teacher-name mb-0">
                                <i class="fas fa-user-tie text-muted mr-1"></i>
                                {{ $data->guruMataPelajaran->guru->inisial }}
                            </p>
                        @else
                            <h6 class="subject-name text-muted">
                                <i class="fas fa-mug-hot mr-1"></i>
                                {{ $data->jamPelajaran->status }}
                            </h6>
                            <p class="teacher-name text-muted mb-0">
                                <i class="fas fa-休 mr-1"></i>
                                Waktu istirahat
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

<style>
    .schedule-card {
        background: white;
        border: 1px solid #e3e6f0;
        border-radius: 0.5rem;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
    }

    .schedule-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
        border-color: #4e73df;
    }

    .schedule-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 0.75rem 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .lesson-number {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .time-badge {
        color: white;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .schedule-body {
        padding: 1rem;
    }

    .subject-name {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #2e3d49;
    }

    .teacher-name {
        font-size: 0.875rem;
        color: #6c757d;
    }
</style>
<div class="col-md-4 mb-4">
  <div class="card border-0 shadow-sm h-100">
    <div class="card-header bg-white py-3">
      <h6 class="mb-0 text-dark font-weight-bold">
        <i class="fas fa-calendar-day text-primary mr-2"></i>Kamis
      </h6>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead class="bg-light text-muted">
            <tr>
              <th class="border-0 px-3 py-2 text-uppercase small font-weight-bold">Guru/Les</th>
              <th class="border-0 py-2 text-uppercase small font-weight-bold">Mata Pelajaran</th>
              <th class="border-0 py-2 text-uppercase small font-weight-bold">Waktu</th>
              <th class="border-0 px-3 py-2 text-uppercase small font-weight-bold text-right">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($jadwal_pelajaran_kamis as $data_jadwal_pelajaran)
              @php $isBelajar = $data_jadwal_pelajaran->jamPelajaran->status == "Belajar"; @endphp
              <tr>
                <td class="px-3 py-2">
                  @if ($isBelajar)
                    <div class="d-flex align-items-center">
                      <div class="avatar-circle-xs bg-light-primary text-primary mr-2">
                        {{ $data_jadwal_pelajaran->guruMataPelajaran->guru->inisial }}
                      </div>
                      <div class="small font-weight-bold text-dark">L-{{ $data_jadwal_pelajaran->jamPelajaran->les_ke }}
                      </div>
                    </div>
                  @else
                    <span class="text-muted small">-</span>
                  @endif
                </td>
                <td class="py-2">
                  @if ($isBelajar)
                    <span
                      class="text-dark small font-weight-medium">{{ $data_jadwal_pelajaran->guruMataPelajaran->mataPelajaran->nama }}</span>
                  @else
                    <span
                      class="badge badge-light-warning text-warning px-2 py-1 small">{{ $data_jadwal_pelajaran->jamPelajaran->status }}</span>
                  @endif
                </td>
                <td class="py-2">
                  <span
                    class="text-muted extra-small">{{ date('H:i', strtotime($data_jadwal_pelajaran->jamPelajaran->jam_mulai)) }}
                    - {{ date('H:i', strtotime($data_jadwal_pelajaran->jam_selesai)) }}</span>
                </td>
                <td class="px-3 py-2 text-right">
                  <form onsubmit="deleteThis(event)" action="{{ route('admin.jadwal_pelajaran.delete') }}" method="POST"
                    style="display:inline-block">
                    {{ csrf_field() }} {{ method_field('DELETE') }}
                    <input type="hidden" name="id" value="{{ $data_jadwal_pelajaran->id }}">
                    <button type="submit" class="btn btn-link text-danger p-0" title="Hapus">
                      <i class="fas fa-times-circle"></i>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="text-center py-4 text-muted small font-italic">Belum ada jadwal</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
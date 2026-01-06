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
              <th class="border-0 px-3 py-2 text-uppercase small font-weight-bold">Les</th>
              <th class="border-0 py-2 text-uppercase small font-weight-bold">Waktu</th>
              <th class="border-0 py-2 text-uppercase small font-weight-bold">Status</th>
              <th class="border-0 px-3 py-2 text-uppercase small font-weight-bold text-right">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($jam_pelajaran_kamis as $data_jam_pelajaran)
              <tr>
                <td class="px-3 py-2 text-muted font-weight-medium text-center" width="60px">
                  {{ $data_jam_pelajaran->les_ke ?? '-' }}</td>
                <td class="py-2 small font-weight-bold text-dark">
                  {{ date('H:i', strtotime($data_jam_pelajaran->jam_mulai)) }} -
                  {{ date('H:i', strtotime($data_jam_pelajaran->jam_selesai)) }}
                </td>
                <td class="py-2">
                  @if($data_jam_pelajaran->status == 'Belajar')
                    <span class="badge badge-light-primary text-primary px-2 py-1">Belajar</span>
                  @elseif($data_jam_pelajaran->status == 'Istirahat')
                    <span class="badge badge-light-warning text-warning px-2 py-1">Istirahat</span>
                  @else
                    <span class="badge badge-light-secondary text-muted px-2 py-1">{{ $data_jam_pelajaran->status }}</span>
                  @endif
                </td>
                <td class="px-3 py-2 text-right">
                  <form onsubmit="deleteThis(event)" action="{{ route('admin.jam_pelajaran.delete') }}" method="POST"
                    style="display:inline-block">
                    {{ csrf_field() }} {{ method_field('DELETE') }}
                    <input type="hidden" name="id" value="{{ $data_jam_pelajaran->id }}">
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
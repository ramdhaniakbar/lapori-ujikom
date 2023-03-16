<table class="table table-bordered">
  <tr>
    <th>Judul Pengaduan</th>
    <td>{{ $pengaduan->judul_pengaduan ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Isi Pengaduan</th>
    <td>{{ $pengaduan->isi_pengaduan ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Lokasi Kejadian</th>
    <td>{{ $pengaduan->lokasi_kejadian ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Tanggal Kejadian</th>
    <td>{{ date('d-m-Y', strtotime($pengaduan->tanggal_kejadian)) ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Status Pengaduan</th>
    <td>{{ $pengaduan->status ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Foto Bukti</th>
    <td>
      <img src="
      @if ($pengaduan->bukti_foto != '')
        @if (File::exists('storage/'.$pengaduan->bukti_foto))
          {{ url(Storage::url($pengaduan->bukti_foto)) }}
        @else
          {{ 'N/A' }}
        @endif
      @else
        {{ 'N/A' }}
      @endif
      "alt="foto bukti" height="150" width="300">
    </td>
  </tr>
</table>
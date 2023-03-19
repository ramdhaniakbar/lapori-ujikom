<table class="table table-bordered">
  <h2>Tanggapan</h2>
  <tr>
    <th>Isi Tanggapan</th>
    <td>{{ $tanggapan->isi_tanggapan ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Tanggal Tanggapan</th>
    <td>{{ date('d-m-Y', strtotime($tanggapan->tanggal_tanggapan)) ?? 'N/A' }}</td>
  </tr>
</table>

<table class="table table-bordered">
  <h2>Pengaduan</h2>
  <tr>
    <th>Judul Pengaduan</th>
    <td>{{ $tanggapan->pengaduan->judul_pengaduan }}</td>
  </tr>
  <tr>
    <th>Isi Pengaduan</th>
    <td>{{ $tanggapan->pengaduan->isi_pengaduan }}</td>
  </tr>
  <tr>
    <th>Tanggal Kejadian</th>
    <td>{{ date('d-m-Y', strtotime($tanggapan->pengaduan->tanggal_kejadian)) ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Lokasi Kejadian</th>
    <td>{{ $tanggapan->pengaduan->lokasi_kejadian }}</td>
  </tr>
  <tr>
    <th>Status Pengaduan</th>
    <td>
      <span class="badge badge-pill
        @if ($tanggapan->pengaduan->status == 'pending') badge-secondary
        @elseif ($tanggapan->pengaduan->status == 'proses') badge-warning
        @elseif ($tanggapan->pengaduan->status == 'ditolak') badge-danger
        @else badge-cyan
        @endif
        " style="padding: 8px 10px; text-transform: capitalize">{{ $tanggapan->pengaduan->status ?? 'N/A' }}</span>
    </td>
  </tr>
  <tr>
    <th>Foto Bukti</th>
    <td>
      <img src="
      @if ($tanggapan->pengaduan->bukti_foto != '')
        @if (File::exists('storage/'.$tanggapan->pengaduan->bukti_foto))
          {{ url(Storage::url($tanggapan->pengaduan->bukti_foto)) }}
        @else
          {{ 'N/A' }}
        @endif
      @else
        {{ 'N/A' }}
      @endif
      " alt="foto bukti" height="150" width="300">
    </td>
  </tr>
</table>

<table class="table table-bordered">
  <h2>Pengadu</h2>
  <tr>
    <th>NIK Pengadu</th>
    <td>{{ $tanggapan->pengaduan->user->nik ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Nama Pengadu</th>
    <td>{{ $tanggapan->pengaduan->user->nama ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Email Pengadu</th>
    <td>{{ $tanggapan->pengaduan->user->email ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Telepon Pengadu</th>
    <td>{{ $tanggapan->pengaduan->user->telepon ?? 'N/A' }}</td>
  </tr>
</table>

<table class="table table-bordered">
  <h2>Petugas</h2>
  <tr>
    <th>Nama Petugas</th>
    <td>{{ $tanggapan->petugas->nama ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Email Petugas</th>
    <td>{{ $tanggapan->petugas->email ?? 'N/A' }}</td>
  </tr>
  <tr>
    <th>Role Petugas</th>
    <td>{{ $tanggapan->petugas->role ?? 'N/A' }}</td>
  </tr>
</table>
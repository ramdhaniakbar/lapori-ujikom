<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>PDF Report</title>
</head>
<body>
  <h2>Nama Petugas: {{ $nama_petugas }}</h2>
  <span style="margin-bottom: 10px; display: inline-block;">Tanggal Print: {{ now()->format('D, d M Y') }}</span>
   <table border="1" cellspacing="0" cellpadding="2">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama Pengadu</th>
            <th>Judul Pengaduan</th>
            <th>Isi Pengaduan</th>
            <th>Isi Tanggapan</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($pengaduans as $key => $pengaduan)
         <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pengaduan->user->nik }} - {{ $pengaduan->user->nama }}</td>
            <td>{{ $pengaduan->judul_pengaduan }}</td>
            <td>{{ $pengaduan->isi_pengaduan }}</td>
            <td>{{ $pengaduan->tanggapan->isi_tanggapan }}</td>
         </tr>
         @endforeach
      </tbody>
   </table>
</body>
</html>
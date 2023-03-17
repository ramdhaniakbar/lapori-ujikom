<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <title>Laporan Pengaduan Masyarakat</title>

   <style>
      body {
         font-family: Arial, sans-serif;
      }

      .header {
         display: flex;
         justify-content: space-between;
      }

      .header h2 {
         margin: 0;
      }

      .header span {
         margin: 0;
      }

      .tanggal {
         display: flex;
         justify-content: space-between;
      }

      .table {
         border-collapse: collapse;
         width: 100%;
      }

      .table th,
      .table td {
         border: 1px solid #ddd;
         padding: 8px;
         text-align: left;
      }

      .table th {
         background-color: #f2f2f2;
         font-weight: bold;
      }

      .table tbody tr:nth-child(even) {
         background-color: #f9f9f9;
      }

      .table tbody tr:hover {
         background-color: #f5f5f5;
      }
   </style>
</head>

<body>
   <div class="header">
      <h2>Nama Petugas: {{ $nama_petugas }}</h2>
      <div class="tanggal">
         <span>Tanggal Print: {{ now()->format('d M Y') }}</span>
         <span>
            @if ($tanggal_filter != '')
            Filter Data Dari Tanggal: {{ $tanggal_filter }}
            @else
            Semua Data
            @endif
         </span>
      </div>
   </div>
   <table class="table">
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
            <td>{{ $loop->iteration ?? 'N/A' }}</td>
            <td>{{ $pengaduan->user->nik }} - {{ $pengaduan->user->nama ?? 'N/A' }}</td>
            <td>{{ $pengaduan->judul_pengaduan ?? 'N/A' }}</td>
            <td>{{ $pengaduan->isi_pengaduan ?? 'N/A' }}</td>
            <td>{{ $pengaduan->tanggapan->isi_tanggapan ?? 'N/A' }}</td>
         </tr>
         @endforeach
      </tbody>
   </table>

</body>

</html>
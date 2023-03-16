@extends('layouts.app')

@section('title', 'Edit Laporan!')

@section('content')
{{-- BEGIN HEADER --}}
@include('components.frontsite.header')
{{-- END HEADER --}}

<div class="container-padded-home mx-auto mt-[110px]">
  <h1 class="font-bold text-[36px] text-title-color w-[518px] mb-[53px]">Edit Laporan Anda
  </h1>
  <form action="{{ route('lapor.update', [$lapor->id]) }}" method="POST" enctype="multipart/form-data"
    class="mb-[126px]">
    @method('PUT')
    @csrf

    <div class="flex space-x-5 mb-10">
      <div class="flex flex-col w-full space-y-2">
        <label for="judul_pengaduan" class="font-medium">Ketik Judul Laporan Anda *</label>
        <input type="text" id="judul_pengaduan" name="judul_pengaduan" value="{{ $lapor->judul_pengaduan }}"
          class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('judul_pengaduan') border-red-color @enderror">

        @error('judul_pengaduan')
        <p class=" mt-2 text-sm text-red-color">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex flex-col w-full space-y-2">
        <label for="kategori_pengaduan_id" class="font-medium">Pilih Kategori Laporan Anda</label>
        <select name="kategori_pengaduan_id" id="kategori_pengaduan_id"
          class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('email') border-red-color @enderror"
          value="{{ old('kategori_pengaduan_id') }}">
          @foreach ($kategori_pengaduans as $key => $kategori_pengaduan)
          <option value="{{ $kategori_pengaduan->id }}" @if ($kategori_pengaduan->id == $lapor->kategori_pengaduan_id)
            selected
            @endif
            >
            {{ $kategori_pengaduan->nama }}
          </option>
          @endforeach
        </select>

        @error('kategori_pengaduan_id')
        <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="flex space-x-5 mb-10">
      <div class="flex flex-col w-full space-y-2">
        <label for="tanggal_kejadian" class="font-medium">Pilih Tanggal Kejadian *</label>
        <input type="date" id="tanggal_kejadian" name="tanggal_kejadian" value="{{ $lapor->tanggal_kejadian }}"
          class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('tanggal_kejadian') border-red-color @enderror">

        @error('tanggal_kejadian')
        <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex flex-col w-full space-y-2">
        <label for="lokasi_kejadian" class="font-medium">Ketik Lokasi Kejadian *</label>
        <input type="text" id="lokasi_kejadian" name="lokasi_kejadian" value="{{ $lapor->lokasi_kejadian }}"
          class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('lokasi_kejadian') border-red-color @enderror">

        @error('lokasi_kejadian')
        <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="flex flex-col w-full space-y-2 mb-10">
      <label for="bukti_foto" class="font-medium">Upload Bukti Foto</label>
      <input type="file" accept="image/png, image/svg, image/jpeg" id="bukti_foto" name="bukti_foto"
        class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('bukti_foto') border-red-color @enderror">

      <img src="
          @if ($lapor->bukti_foto != '')
            @if (File::exists('storage/'.$lapor->bukti_foto))
              {{ url(Storage::url($lapor->bukti_foto)) }}
            @else
              {{ 'N/A' }}
            @endif
          @else
            {{ 'N/A' }}
          @endif
        " alt="foto bukti" height="100" width="200" class="rounded-xl mb-[60px]">

      @error('bukti_foto')
      <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex space-x-5 mb-10">
      <div class="flex flex-col w-full space-y-2">
        <label for="isi_pengaduan" class="font-medium">Ketik Isi Laporan Anda *</label>
        <textarea name="isi_pengaduan" id="isi_pengaduan" cols="30" rows="10"
          class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('isi_pengaduan') border-red-color @enderror">{{ $lapor->isi_pengaduan }}</textarea>

        @error('isi_pengaduan')
        <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
        @enderror
      </div>
    </div>

    <div class="flex space-x-2">
      <button type="submit" class="bg-black-color text-white-color font-semibold py-3.5 rounded-xl w-2/4">Edit
        Laporan!
      </button>
    </div>

  </form>

</div>

<hr class="text-[#DBDBDB]">

<div class="container-padded-home mx-auto">

  {{-- BEGIN FOOTER --}}
  @include('components.frontsite.footer')
  {{-- END FOOTER --}}

</div>

@endsection
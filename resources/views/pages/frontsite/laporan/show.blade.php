@extends('layouts.app')

@section('title', 'Detail Laporan!')

@section('content')
{{-- BEGIN HEADER --}}
@include('components.frontsite.header')
{{-- END HEADER --}}

<div class="container-padded-home mx-auto mt-[110px]">
  <div class="flex justify-between">
    <span class="font-medium text-dark-gray text-[18px] mb-[40px] inline-block">Kategori: {{
      $lapor->kategori_pengaduan->nama
      }}</span>
    <span class="font-medium text-dark-gray text-[18px] mb-[40px] inline-block">Tanggal Kejadian: {{ $tanggal_kejadian
      }}</span>
  </div>

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
  " alt="foto bukti" height="500" class="w-full rounded-xl mb-[60px]">

  <div class="flex justify-between items-center mb-[38px]">
    <h2 class="font-bold text-black-color text-[32px]">{{ $lapor->judul_pengaduan }}</h2>
    <span class="px-3 py-1 rounded-full capitalize text-[16px] font-medium
         @if ($lapor->status == 'pending') bg-light-gray text-black-color
         @elseif ($lapor->status == 'proses') bg-blue-color text-white-color
         @elseif ($lapor->status == 'ditolak') bg-red-color text-white-color
         @else bg-green-color text-black-color
         @endif
      ">{{ $lapor->status }}
    </span>
  </div>

  <div class="w-full mb-[70px]">
    <p class="font-medium text-[20px] text-dark-gray">{{ $lapor->isi_pengaduan }}</p>
  </div>

  <div>
    @if ($lapor->tanggapan)
    <h2 class="font-semibold text-[30px] text-black-color mb-[38px]">Tanggapan</h2>

    <hr class="text-[#DBDBDB]">

    <div class="mt-[36px] mb-[112px]">
      <div class="flex items-start space-x-6">
        <img src="{{ asset('assets/frontsite/images/user-profile.svg') }}" style="width: 70px;" alt="profile user">
        <div class="flex flex-col">
            <span class="font-medium text-black-color text-[24px]">{{ $lapor->tanggapan->petugas->nama }}</span>
          <span class="text-black-color capitalize text-[16px] mb-[20px]">{{ $lapor->tanggapan->petugas->role }}</span>
          <p class="font-medium text-[20px] text-dark-gray">{{ $lapor->tanggapan->isi_tanggapan }}</p>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>

<hr class="text-[#DBDBDB]">

<div class="container-padded-home mx-auto">

  {{-- BEGIN FOOTER --}}
  @include('components.frontsite.footer')
  {{-- END FOOTER --}}

</div>

@endsection